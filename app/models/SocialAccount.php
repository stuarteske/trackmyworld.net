<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 20/07/2014
 * Time: 14:02
 */

class SocialAccount extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_social_account';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function findOneBySocialUserIdAndSocialNetworkName($socialUserId = '', $socialNetworkName = '')
    {
        return SocialAccount::where('social_user_id', $socialUserId)
            ->where( 'network', $socialNetworkName )
            ->first();
    }

    public static function findOneByUserIdAndSocialNetworkName($userId = '', $socialNetworkName = '')
    {
        return SocialAccount::where('user_id', $userId)
            ->where( 'network', $socialNetworkName )
            ->first();
    }

    public static function hasLinkedAccount($userId = 0, $networkName = '') {
        if ($userId == 0) $userId = Auth::id();

        $socialAccount = SocialAccount::findOneByUserIdAndSocialNetworkName(
            $userId,
            $networkName
        );

        return isset($socialAccount);
    }

}