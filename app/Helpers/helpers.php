<?php
use App\Settings;
use App\User;
use App\Commision;
use App\UpgradeWallet;
use App\Donation;

    function OtherContribution($collection,$a){
        $parent_user = User::find(\Auth::user()->coordinates->parent);
        $temp = 'level_three_percentage'.$a;
        $parent_amount = Settings::first()->$temp;
        commission($parent_amount,$parent_user,0);

        $data = ['name' => $parent_user->name, 'user' => \Auth::user(), 'amount'=> $parent_amount];
        $contactEmail = $parent_user->email;
        $collection->push([$data,$contactEmail]);

        if($super_parent_user = User::find($parent_user->coordinates->parent)){
            $temp = 'level_two_percentage'.$a;
            $super_parent_amount = Settings::first()->$temp;
            commission($super_parent_amount,$super_parent_user,0);

            $data = ['name' => $super_parent_user->name, 'user' => \Auth::user(), 'amount'=> $super_parent_amount];
            $contactEmail = $super_parent_user->email;
            $collection->push([$data,$contactEmail]);

            if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                $temp = 'level_one_percentage'.$a;
                $super_duper_parent_amount = Settings::first()->$temp;
                commission($super_duper_parent_amount,$super_duper_parent_user,0);

                if($a != '_premium'){
                    $foo = 'upgrade_wallet_amount'.$a;
                    upgradeWalletAmount(Settings::first()->$foo,$super_duper_parent_user->id);
                }
                
                $data = ['name' => $super_duper_parent_user->name, 'user' => \Auth::user(), 'amount'=> $super_duper_parent_amount];
                $contactEmail = $super_duper_parent_user->email;
                $collection->push([$data,$contactEmail]);
            }else{
                $temp = 'level_one_percentage'.$a;
                $super_duper_parent_amount = Settings::first()->$temp;
                $data = ['name' => User::where('admin',1)->first()->name, 'user' => \Auth::user(), 'amount'=> $super_duper_parent_amount];
                $contactEmail = User::where('admin',1)->first()->email;
                $collection->push([$data,$contactEmail]);
                commission($super_duper_parent_amount,User::where('admin',1)->first(),0);
                if($a != '_premium'){
                    $foo = 'upgrade_wallet_amount'.$a;
                    upgradeWalletAmount(Settings::first()->$foo,User::where('admin',1)->first()->id);
                }
            }
        }else{
            $temp = 'level_two_percentage'.$a;
            $super_parent_amount = Settings::first()->$temp;
            $data = ['name' => User::where('admin',1)->first()->name, 'user' => \Auth::user(), 'amount'=> $super_parent_amount];
            $contactEmail = User::where('admin',1)->first()->email;
            $collection->push([$data,$contactEmail]);
            commission($super_parent_amount,User::where('admin',1)->first(),0);

            $temp = 'level_one_percentage'.$a;
            $super_duper_parent_amount = Settings::first()->$temp;
            $data = ['name' => User::where('admin',1)->first()->name, 'user' => \Auth::user(), 'amount'=> $super_duper_parent_amount];
            $contactEmail = User::where('admin',1)->first()->email;
            $collection->push([$data,$contactEmail]);
            commission($super_duper_parent_amount,User::where('admin',1)->first(),0);

            if($a != '_premium'){
                $foo = 'upgrade_wallet_amount'.$a;
                upgradeWalletAmount(Settings::first()->$foo,User::where('admin',1)->first()->id);
            }
        }
        return $collection;
    }

    function commission($amount,$user,$ac){
        $commission = new Commision;
        $commission->user_id = $user->id;
        $commission->amount = $amount;
        $commission->from = \Auth::id();
        $commission->ac = $ac;
        $commission->save();
    }

    function upgradeWalletAmount($amount,$id){
        $upgrade_wallet = new UpgradeWallet;
        $upgrade_wallet->user_id = $id;
        $upgrade_wallet->amount = $amount;
        $upgrade_wallet->save(); 
    }

    function donate($package, $amount, $a , $collection){
        $donation = new Donation;
        $donation->user_id = \Auth::user()->id;
        $donation->package = $package;
        $donation->amount = $amount;
        $donation->save();
        
        $temp = 'admin_amount'.$a;
        $data = ['name' => User::where('admin',1)->first()->name, 'user' => \Auth::user(), 'amount'=> Settings::first()->$temp];
        $contactEmail = User::where('admin',1)->first()->email;
        $collection->push([$data,$contactEmail]);
        commission(Settings::first()->$temp,User::where('admin',1)->first(),1);
        return $collection;
    }

    function sendMail($data, $contactEmail){
        \Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
            {  
                $message->to($contactEmail)->subject('Contribution Amount!!');
            });
        $data = ['user'=>\Auth::user()];
        \Mail::send('emails.thankYou', $data, function($message) use ($contactEmail)
            {  
                $message->to(\Auth::user()->email)->subject('Thankyou');
            });
    }