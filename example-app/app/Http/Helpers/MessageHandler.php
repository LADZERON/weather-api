<?php declare(strict_types=1);

// Simple example bot.
// PHP 8.1.15+ or 8.2.4+ is required.

// Run via CLI (recommended: `screen php bot.php`) or via web.

// To reduce RAM usage, follow these instructions: https://docs.madelineproto.xyz/docs/DATABASE.html


use danog\MadelineProto\EventHandler\Message\ChannelMessage;
use danog\MadelineProto\EventHandler\Plugin\RestartPlugin;
use danog\MadelineProto\SimpleEventHandler;
use danog\MadelineProto\EventHandler\Filter\FilterPeer;

// Load via composer (RECOMMENDED, see https://docs.madelineproto.xyz/docs/INSTALLATION.html#composer-from-scratch)
if (file_exists('vendor/autoload.php')) {
    require_once 'vendor/autoload.php';
}

class BasicEventHandler extends SimpleEventHandler
{
    // !!! Change this to your username !!!
    public const ADMIN = "@ladzeron";

    /**
     * Get peer(s) where to report errors.
     */
    public function getReportPeers()
    {
        return [self::ADMIN];
    }

    /**
     * Returns a set of plugins to activate.
     *
     * See here for more info on plugins: https://docs.madelineproto.xyz/docs/PLUGINS.html
     */
    public static function getPlugins(): array
    {
        return [
            // Offers a /restart command to admins that can be used to restart the bot, applying changes.
            // Make sure to run in a bash while loop when running via CLI to allow self-restarts.
            RestartPlugin::class,
        ];
    }

    /**
     * Handle incoming updates from users, chats and channels.
     */
    #[FilterPeer(-1001606035281)]
    public function handleMessage(ChannelMessage $message): void
    {
        dump($message);
    }
}

BasicEventHandler::startAndLoop('bot.madeline');
