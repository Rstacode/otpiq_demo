<?php
namespace App\Http\Controllers;

use Livewire\Component;
use Rstacode\Otpiq\DTOs\SmsData;
use Rstacode\Otpiq\Facades\Otpiq;

class Welcome extends Component
{
    public $phoneNumber = "9647704695176", $verificationCode = "1234", $customMessage = "Hello World", $senderId = "drawsha", $provider = "auto", $smsId;

    public function save()
    {
        $response = Otpiq::sendSms(new SmsData(
            phoneNumber: $this->phoneNumber,
            smsType: 'verification',
            provider: $this->provider,
            verificationCode: $this->verificationCode
        ));

        return dd($response);
    }
    public function save2()
    {
        $response = Otpiq::sendSms(new SmsData(
            phoneNumber: $this->phoneNumber,
            smsType: 'custom',
            customMessage: $this->customMessage,
            senderId: $this->senderId,
        ));
    }

    public function getProjectInformation()
    {
        $projectInfo = Otpiq::getProjectInfo();
        return dd($projectInfo);
    }
    public function getProjectSenderIds()
    {
        $senderIds = Otpiq::getSenderIds();
        return dd($senderIds);
    }
    public function save3()
    {
        $status = Otpiq::trackSms($this->smsId);
        return dd($status);
    }
    public function render()
    {
        $array = [
            'providers' => [
                ['name' => 'Auto', 'value' => 'auto'],
                ['name' => 'SMS', 'value' => 'sms'],
                ['name' => 'Whatsapp', 'value' => 'whatsapp'],
                ['name' => 'Telegram', 'value' => 'telegram'],
            ],
        ];
        return view('welcome', $array)->extends('layouts.app');
    }
}
