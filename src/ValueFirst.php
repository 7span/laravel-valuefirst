<?php

declare(strict_types=1);

namespace SevenSpan\ValueFirst;

use Illuminate\Support\Facades\Http;
use SevenSpan\ValueFirst\Helpers\TemplateFormatter;

final class ValueFirst implements ValueFirstInterface
{
    /**
     * @return array|mixed
     */
    public function sendMessage(string $to, string $message, string $tag = '')
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
            ->post(config('valuefirst.api_uri'), $this->getBody($to, $message, 'simple', $tag))
        ;

        // Throw an exception if a client or server error occurred...
        $response->throw();

        return $response->json();
    }

    /**
     * @param string $data
     *
     * @return array|mixed
     */
    public function sendTemplateMessage(string $to, string $templateId, array $data, string $tag = '')
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
            ->post(config('valuefirst.api_uri'), $this->getBody($to, $templateId, 'template', $tag, $data))
        ;

        // Throw an exception if a client or server error occurred...
        $response->throw();

        return $response->json();
    }

    /**
     * @param string $data
     *
     * @return array|mixed
     */
    public function sendTemplateMessageWithButton(string $to, string $templateId, array $data, string $tag = '', string $urlParam = '')
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
            ->post(config('valuefirst.api_uri'), $this->getBody($to, $templateId, 'templateWithButton', $tag, $data, $urlParam))
        ;

        // Throw an exception if a client or server error occurred...
        $response->throw();

        return $response->json();
    }
    
    /**
     * @param string $data
     *
     * @return array|mixed
     */
    public function sendTemplateMessageWithMedia(string $to, string $templateId, array $data, string $mediaData , string $tag = '')
    {
        $params = array(
            "data" => json_encode($this->getBody($to, $templateId, 'templateWithMedia', $tag, $data, null, $mediaData)),
            "action" => "send"
        );
        $response = Http::asForm()->withToken(env('WA_TOKEN'))->post(env('VF_API_URI'), $params);

        // Throw an exception if a client or server error occurred...
        $response->throw();

        return $response->json();
    }

    /**
     * @param string $mesageType
     *
     * @return array
     */
    private function getBody(string $to, string $message, string $messageType, string $tag = '', array $data = [], string $urlParam = null, string $mediaData = null)
    {
        $body = [];
        $body['@VER'] = '1.2';

        $body['USER']['@USERNAME'] = config('valuefirst.username');
        $body['USER']['@PASSWORD'] = config('valuefirst.password');
        $body['USER']['@UNIXTIMESTAMP'] = '';

        $body['DLR']['@URL'] = '';

        $body['SMS'] = [];

        $address = [];
        array_push($address, [
            '@FROM' => config('valuefirst.from'),
            '@TO' => $to,
            '@SEQ' => '1',
            '@TAG' => $tag,
        ]);

        $sms = [
            '@UDH' => '0',
            '@CODING' => '1',
            '@PROPERTY' => '0',
            '@ID' => '1',
            'ADDRESS' => $address,
        ];

        switch ($messageType) {
            case 'template':
                $sms['@TEMPLATEINFO'] = TemplateFormatter::formatTemplateData($message, $data);

                break;

            case 'templateWithButton':
                $body['USER']['@CH_TYPE'] = '4';
                $sms['@MSGTYPE'] = '3';
                $sms['@B_URLINFO'] = $urlParam;
                $sms['@TEMPLATEINFO'] = TemplateFormatter::formatTemplateData($message, $data);

                break;
                
            case 'templateWithMedia':
                $sms['@TEMPLATEINFO'] = $this->formatTemplateData($message, $data);
                $sms['@MEDIADATA'] = $mediaData;
                $sms['@MSGTYPE'] = '3';
                $sms['@TYPE'] = "image";
                $body['USER']['@CH_TYPE'] = '4';
                break;

            default:
                $sms['@TEXT'] = $message;

                break;
        }
        $body['SMS'][] = $sms;

        return $body;
    }
}
