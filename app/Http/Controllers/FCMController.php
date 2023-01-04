<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\FCMService;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification as MessagingNotification;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kutia\Larafirebase\Messages\FirebaseMessage;

class FCMController extends Notification
{
    public function index(Request $request){
        
        return view('testNotif');
    }
    public function save_fcm_token(Request $request){
        $fcm_token = $request->fcm_token;
        $user_id = $request->user_id;
        $user = User::findOrFail($user_id);
        $user->fcm_token=$fcm_token;
        $user->save();
        return response()->json([
            'success' => 'true',
            'message' => 'user token updated'
        ]);
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['firebase'];
    }
 
    /**
     * Get the firebase representation of the notification.
     */
    public function toFirebase()
    {
        // $tokens=[];
        $token2=User::findOrFail('3')->fcm_token;
        // $tokens[0]=$token1;
        // $tokens[1]=$token2;
        $deviceTokens = [
            $token2
        ];
 
        return (new FirebaseMessage)
            ->withTitle('Hey, ')
            ->withBody('Happy Birthday!')
            ->asNotification($deviceTokens);
            // OR ->asMessage($deviceTokens);
    }
    function test(){

        $firebaseToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();
        $SERVER_API_KEY = 'AAAAbQlH7Qw:APA91bEx9nC01HGG8Ao-tQ8ZYKExsRYxXE34nKHGI9b9oWEQWqQYAh3H1WaRW0-yD_QlMfs4UTqvoN1HxXXz1bsncnNhpIrtcHQ9rknkJTey0sE6a3dKbYxwiiaPDSRrd4AMLjOa1I3W';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'test',
                "body" => 'ceci est un test',  
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        // dd($response);
        return back()->with('success', $response);
    }
    // public function sendNotification()
    // {
    //     $tokens=[];
    //     $token1=User::findOrFail('1')->fcm_token;
    //     $token2=User::findOrFail('3')->fcm_token;
    //     $tokens[0]=$token1;
    //     $tokens[1]=$token2;
    //     //array_push($deviceTokens,$token1,$token2);
    //     return Larafirebase::withTitle('Test Title')
    //         ->withBody('Test body')
    //         // ->withImage('https://firebase.google.com/images/social.png')
    //         // ->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
    //         ->withSound('default')
    //         ->withClickAction('https://www.google.com')
    //         ->withPriority('high')
    //         ->withAdditionalData([
    //             'color' => '#rrggbb',
    //             'badge' => 0,
    //         ])
    //         ->sendNotification($tokens);
    // }

    // public function sendMessage()
    // {
    //     $tokens=[];
    //     $token1=User::findOrFail('1')->fcm_token;
    //     $token2=User::findOrFail('3')->fcm_token;
    //     $tokens[0]=$token1;
    //     $tokens[1]=$token2;
    //     return Larafirebase::withTitle('Test Title')
    //         ->withBody('Bonjour')
    //         ->sendMessage($tokens);
            
    //     // Or
    //     // return Larafirebase::fromArray(['title' => 'Test Title', 'body' => 'Test body'])->sendMessage($this->deviceTokens);
    // }
}
