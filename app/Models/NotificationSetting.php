<?php

namespace App\Models;

use App\Mail\NotifyMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class NotificationSetting extends Model
{
    protected $table = "notification_settings";
    public function category()
    {
        return $this->belongsTo('App\NotificationCategory', 'category_id');
    }
    public function scopeApproved($query)
    {
        return $query->where('status',1);
    }
    public function scopeSettings($query)
    {
        return $query->where('slug', '!=', 'basic');
    }
    public function notify($user, $slug, $url=null)
    {
            $notification = $this->where('slug', $slug)->first();

            $fromMail = $notification->fromMail?? env('MAIL_FROM_ADDRESS');
            $data['subject'] = $notification->subject;
            $data['fromMail'] = $fromMail.'@'.getDomainEmail();
            $data['fromName'] = $notification->fromName?? env('MAIL_FROM_NAME');
            $body = $notification->body;
            $data['text'] = str_replace('{username}', ucfirst($user->name), $body);
            if($url!=null)
            {
                $data['url']=$url;
            }
            $notify = new NotifyMail($data);
            if($notification->status)
            {
                if($slug!='forgot-password')
                {
                    $email = $user->notifyEmail();
                }else {
                    $email = $user->email;
                }
                Mail::to($email)->send($notify);
            }

        return $notify;
    }

}
