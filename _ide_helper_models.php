<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $symbol
 * @property string|null $address
 * @property string $logo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $image_url
 * @property-read mixed $price
 * @property-read \App\Models\Wallet|null $wallet
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUpdatedAt($value)
 */
	class Asset extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $trader_id
 * @property int $user_id
 * @property int $amount
 * @property int $profit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Trader|null $trader
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Copier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Copier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Copier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Copier whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Copier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Copier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Copier whereProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Copier whereTraderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Copier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Copier whereUserId($value)
 */
	class Copier extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $asset_id
 * @property string $trader_type
 * @property int $trader_id
 * @property string $wallet_type
 * @property int $wallet_id
 * @property string $type_type
 * @property int $type_id
 * @property int $quantity
 * @property int $price
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAssetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTraderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTraderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTypeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWalletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWalletType($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $category
 * @property string $content
 * @property string|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property int $duration_in_days
 * @property int|null $order
 * @property array|null $features
 * @property-read mixed $interval
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDurationInDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePrice($value)
 */
	class Plan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property int $user_id
 * @property string $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Plan|null $plan
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserId($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $rio
 * @property int $pnl
 * @property int $share_percent
 * @property int $wins
 * @property int $losses
 * @property int $copiers
 * @property int $max_copiers
 * @property int $min_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Copier> $members
 * @property-read int|null $members_count
 * @method static \Database\Factories\TraderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Trader newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trader newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trader query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereCopiers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereLosses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereMaxCopiers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereMinAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader wherePnl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereRio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereSharePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trader whereWins($value)
 */
	class Trader extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $payable_type
 * @property int $payable_id
 * @property int $wallet_id
 * @property string $type
 * @property float $amount
 * @property bool $confirmed
 * @property array|null $meta
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $amount_float
 * @property-read int $amount_int
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $payable
 * @property-read \App\Models\Wallet $wallet
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePayableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePayableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereWalletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction withoutTrashed()
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $currency
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property bool $is_admin
 * @property bool $blocked
 * @property bool $restricted
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\non-empty-string $balance
 * @property-read int $balance_int
 * @property-read \App\Models\Wallet $wallet
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Copier> $investments
 * @property-read int|null $investments_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transfer> $receivedTransfers
 * @property-read int|null $received_transfers_count
 * @property-read \App\Models\Subscription|null $subscription
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transfer> $transfers
 * @property-read int|null $transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $walletTransactions
 * @property-read int|null $wallet_transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wallet> $wallets
 * @property-read int|null $wallets_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRestricted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Bavix\Wallet\Interfaces\Wallet, \Filament\Models\Contracts\FilamentUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $holder_type
 * @property int $holder_id
 * @property string $name
 * @property string $currency
 * @property string $slug
 * @property string $uuid
 * @property string|null $description
 * @property array|null $meta
 * @property \Bavix\Wallet\Models\non-empty-string $balance
 * @property int $decimal_places
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Asset|null $asset
 * @property-read string|int|float $available_balance
 * @property-read \Bavix\Wallet\Models\non-empty-string $balance_float
 * @property-read float $balance_float_num
 * @property-read int $balance_int
 * @property-read string $credit
 * @property-read string $original_balance
 * @property-read mixed $title
 * @property-read \Bavix\Wallet\Models\WalletModel|null $wallet
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $holder
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transfer> $receivedTransfers
 * @property-read int|null $received_transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transfer> $transfers
 * @property-read int|null $transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $walletTransactions
 * @property-read int|null $wallet_transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDecimalPlaces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereHolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereHolderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet withoutTrashed()
 */
	class Wallet extends \Eloquent {}
}

