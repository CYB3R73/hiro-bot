<?php

namespace hiro\commands;

use Discord\DiscordCommandClient;
use Discord\Parts\Embed\Embed;

/**
 * Happy command class
 */
class Happy
{
    
    /**
     * command category
     */
    private $category;
    
    /**
     * $client
     */
    private $discord;
    
    /**
     * __construct
     */
    public function __construct(DiscordCommandClient $client)
    {
        $this->discord = $client;
        $this->category = "fun";
        $client->registerCommand('happy', function($msg, $args)
        {
            $gifs = [
                "https://bariscodefxy.github.io/cdn/hiro/slap.gif",
                "https://bariscodefxy.github.io/cdn/hiro/slap_1.gif",
                "https://bariscodefxy.github.io/cdn/hiro/slap_2.gif",
                "https://bariscodefxy.github.io/cdn/hiro/slap_3.gif",
                "https://bariscodefxy.github.io/cdn/hiro/slap_4.gif",
                "https://bariscodefxy.github.io/cdn/hiro/slap_5.gif",
            ];
            $random = $gifs[rand(0, sizeof($gifs) - 1)];
            $self = $msg->author->user;
            $user = $msg->mentions->first();
            if(empty($user))
            {
                $embed = new Embed($this->discord);
                $embed->setColor("#ff0000");
                $embed->setTimestamp();
                $msg->channel->sendEmbed($embed);
                return;
            }else if($user->id == $self->id)
            {
                $embed = new Embed($this->discord);
                $embed->setColor("#ff0000");
                $embed->setTimestamp();
                $msg->channel->sendEmbed($embed);
                return;
            }
            $embed = new Embed($this->discord);
            $embed->setColor("#ff0000");
            $embed->setImage($random);
            $embed->setTimestamp();
            $msg->channel->sendEmbed($embed);
        }, [
            "aliases" => [
                "mutlu"
            ],
            "description" => "Show other friends that you are happy"
        ]);
    }
    
    public function __get(string $name)
    {
        return $this->{$name};
    }
    
}
