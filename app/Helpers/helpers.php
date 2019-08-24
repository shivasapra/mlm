<?php
use App\Settings;
use App\User;
use App\Commision;
use App\UpgradeWallet;
use App\Donation;

    function PaiseBaato($collection, $coordinates, $a, $user){

        $sponsor = User::where('username',$user->details->invited_by)->first();
        $temp = 'level_three_percentage'.$a;
        $level_three_amount = Settings::first()->$temp;
        // dd();
        commission($level_three_amount,$sponsor,0, $user);

        $data = ['name' => $sponsor->name, 'user' => $user, 'amount'=> $level_three_amount];
        $contactEmail = $sponsor->email;
        $collection->push([$data,$contactEmail]);
            if($sponsor->id == $coordinates->parent){
                $super_parent_user = User::find($sponsor->coordinates->parent);
            }else{
                $super_parent_user = User::find($coordinates->parent);
            }

            if($super_parent_user ){
                $temp = 'level_two_percentage'.$a;
                $super_parent_amount = Settings::first()->$temp;
                commission($super_parent_amount,$super_parent_user,0, $user);
    
                $data = ['name' => $super_parent_user->name, 'user' => $user, 'amount'=> $super_parent_amount];
                $contactEmail = $super_parent_user->email;
                $collection->push([$data,$contactEmail]);
    
                if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                    $temp = 'level_one_percentage'.$a;
                    $super_duper_parent_amount = Settings::first()->$temp;
                    commission($super_duper_parent_amount,$super_duper_parent_user,0, $user);
    
                    if($a != '_premium'){
                        $foo = 'upgrade_wallet_amount'.$a;
                        upgradeWalletAmount(Settings::first()->$foo,$super_duper_parent_user->id);
                    }
                    
                    $data = ['name' => $super_duper_parent_user->name, 'user' => $user, 'amount'=> $super_duper_parent_amount];
                    $contactEmail = $super_duper_parent_user->email;
                    $collection->push([$data,$contactEmail]);
                }else{
                    $temp = 'level_one_percentage'.$a;
                    $super_duper_parent_amount = Settings::first()->$temp;
                    $data = ['name' => User::where('admin',1)->first()->name, 'user' => $user, 'amount'=> $super_duper_parent_amount];
                    $contactEmail = User::where('admin',1)->first()->email;
                    $collection->push([$data,$contactEmail]);
                    commission($super_duper_parent_amount,User::where('admin',1)->first(),0, $user);
                    if($a != '_premium'){
                        $foo = 'upgrade_wallet_amount'.$a;
                        upgradeWalletAmount(Settings::first()->$foo,User::where('admin',1)->first()->id);
                    }
                }
            }else{
                $temp = 'level_two_percentage'.$a;
                $super_parent_amount = Settings::first()->$temp;
                $data = ['name' => User::where('admin',1)->first()->name, 'user' => $user, 'amount'=> $super_parent_amount];
                $contactEmail = User::where('admin',1)->first()->email;
                $collection->push([$data,$contactEmail]);
                commission($super_parent_amount,User::where('admin',1)->first(),0, $user);
    
                $temp = 'level_one_percentage'.$a;
                $super_duper_parent_amount = Settings::first()->$temp;
                $data = ['name' => User::where('admin',1)->first()->name, 'user' => $user, 'amount'=> $super_duper_parent_amount];
                $contactEmail = User::where('admin',1)->first()->email;
                $collection->push([$data,$contactEmail]);
                commission($super_duper_parent_amount,User::where('admin',1)->first(),0, $user);
    
                if($a != '_premium'){
                    $foo = 'upgrade_wallet_amount'.$a;
                    upgradeWalletAmount(Settings::first()->$foo,User::where('admin',1)->first()->id);
                }
            }
        

        return $collection;
    }

    function commission($amount,$user,$ac, $u){
        $commission = new Commision;
        $commission->user_id = $user->id;
        $commission->amount = $amount;
        $commission->from = $u->id;
        $commission->ac = $ac;
        $commission->save();
    }

    function upgradeWalletAmount($amount,$id){
        $upgrade_wallet = new UpgradeWallet;
        $upgrade_wallet->user_id = $id;
        $upgrade_wallet->amount = $amount;
        $upgrade_wallet->save(); 
    }

    function donate($package, $amount, $a , $collection, $user){
        $donation = new Donation;
        $donation->user_id = $user->id;
        $donation->package = $package;
        $donation->amount = $amount;
        $donation->save();
        
        $temp = 'admin_amount'.$a;
        $data = ['name' => User::where('admin',1)->first()->name, 'user' => $user, 'amount'=> Settings::first()->$temp];
        $contactEmail = User::where('admin',1)->first()->email;
        $collection->push([$data,$contactEmail]);
        commission(Settings::first()->$temp,User::where('admin',1)->first(),1,$user);
        return $collection;
    }

    function sendMail($data, $contactEmail, $user){
        \Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
            {  
                $message->to($contactEmail)->subject('Contribution Amount!!');
            });
        $data = ['user'=>$user];
        \Mail::send('emails.thankYou', $data, function($message) use ($contactEmail,$user)
            {  
                $message->to($user->email)->subject('Thankyou');
            });
    }