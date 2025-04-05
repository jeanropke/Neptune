<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Group\DiscussionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HabboImaging;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\Home\NoteEditorController;
use App\Http\Controllers\Home\WidgetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\Housekeeping\AuthController as HousekeepingAuthController;
use App\Http\Controllers\Housekeeping\DashboardController;
use App\Http\Controllers\Housekeeping\FurniPickerController;
use App\Http\Controllers\Housekeeping\Furniture\CatalogueController;
use App\Http\Controllers\Housekeeping\Furniture\FurnitureController;
use App\Http\Controllers\Housekeeping\Furniture\WebOfferController;
use App\Http\Controllers\Housekeeping\Moderation\EditorController as HousekeepingEditorController;
use App\Http\Controllers\Housekeeping\Moderation\CreditsController as HousekeepingCreditsController;
use App\Http\Controllers\Housekeeping\Moderation\LogController;
use App\Http\Controllers\Housekeeping\Moderation\RemoteController;
use App\Http\Controllers\Housekeeping\Moderation\ReportController as HouseekeepingReportController;
use App\Http\Controllers\Housekeeping\Moderation\UserController;
use App\Http\Controllers\Housekeeping\Server\ServerGeneralController;
use App\Http\Controllers\Housekeeping\Site\AdvertisementController;
use App\Http\Controllers\Housekeeping\Site\ArticleController as HousekeepingArticleController;
use App\Http\Controllers\Housekeeping\Site\BoxController;
use App\Http\Controllers\Housekeeping\Site\MenuController;
use App\Http\Controllers\Housekeeping\Site\SiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/maintenance', [IndexController::class, 'maintenance'])->name('index.maintenance');

Route::middleware('user')->group(function () {
    //IndexController means all pages in 'Home', including subpages.
    Route::get('/', [IndexController::class, 'home'])->name('index.home');

    Route::get('/article/{url}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/articles', [ArticleController::class, 'articles'])->name('article.articles');

    Route::get('account/logout', [AuthController::class, 'logout'])->name('account.logout');
    Route::get('/account/disconnected', [AuthController::class, 'accountDisconnected'])->name('account.disconnect');


    Route::get('room/{id}', function ($id) {
        $room = Room::find($id);
        if(!$room) return redirect('404');
        return view('room')->with('room', $room);
    });
    //HotelController
    Route::prefix('hotel')->group(function () {
        Route::get('/', [HotelController::class, 'index'])->name('hotel.index');
        Route::get('/pets', [HotelController::class, 'pets'])->name('hotel.pets');
        Route::get('/pets/taking_care_of_your_pet', [HotelController::class, 'takingCareOfYourPet'])->name('hotel.pets');
        Route::get('/room', [HotelController::class, 'room'])->name('hotel.room');
        Route::get('/staff', [HotelController::class, 'staff'])->name('hotel.staff');
        Route::get('/groups', [HotelController::class, 'groups'])->name('hotel.groups');
        Route::get('/homes', [HotelController::class, 'homes'])->name('hotel.homes');
        Route::get('/web', [HotelController::class, 'web'])->name('hotel.web');
        Route::get('/navigator', [HotelController::class, 'navigator'])->name('hotel.navigator');
        Route::get('/welcome_to_habbo_hotel/how_to_get_started', [HotelController::class, 'welcomeStarted'])->name('hotel.welcome.started');
        Route::get('/welcome_to_habbo_hotel/chatting', [HotelController::class, 'welcomeChatting'])->name('hotel.welcome.chatting');
        Route::get('/welcome_to_habbo_hotel/navigator', [HotelController::class, 'welcomeNavigator'])->name('hotel.welcome.navigator');
        Route::get('/welcome_to_habbo_hotel/your_own_room', [HotelController::class, 'welcomeRoom'])->name('hotel.welcome.room');
        Route::get('/welcome_to_habbo_hotel/help_safety', [HotelController::class, 'welcomeHelp'])->name('hotel.welcome.help');

        Route::prefix('trax')->group(function () {
            Route::get('/', function() { return view('hotel.trax.index'); })->name('hotel.trax.index');
            Route::get('/store', function() { return view('hotel.trax.store'); })->name('hotel.trax.store');

            Route::prefix('masterclass')->group(function () {
                Route::get('/', function() { return view('hotel.trax.masterclass.index'); })->name('hotel.trax.masterclass.index');
            });
        });
    });

    //ClubController
    Route::prefix('club')->group(function () {
        Route::get('/', [ClubController::class, 'index'])->name('club.index');
        Route::get('/join', [ClubController::class, 'join'])->name('club.join');
        Route::get('/shop', [ClubController::class, 'shop'])->name('club.shop');
        Route::get('/benefits/habbo', [ClubController::class, 'benefitsHabbo'])->name('club.benefits.habbo');
        Route::get('/benefits/room', [ClubController::class, 'benefitsRoom'])->name('club.benefits.room');
        Route::get('/benefits/home', [ClubController::class, 'benefitsHome'])->name('club.benefits.home');
        Route::get('/benefits/extras', [ClubController::class, 'benefitsExtras'])->name('club.benefits.extras');
    });

    Route::prefix('habboclub')->group(function () {
        Route::post('/habboclub_subscribe', [ClubController::class, 'clubSubscribe'])->name('club.subscribe');
        Route::post('/habboclub_subscribe_submit', [ClubController::class, 'clubSubscribeSubmit'])->name('club.subscribe.submit');
        Route::post('/habboclub_meter_update', [ClubController::class, 'clubMeterUpdate'])->name('club.subscribe.submit');
    });

    Route::prefix('community')->group(function () {
        Route::get('/', [CommunityController::class, 'index'])->name('community.index');
        Route::get('/fansites', [CommunityController::class, 'fansites'])->name('community.fansites');
    });

    Route::prefix('games')->group(function () {
        Route::get('/', [GameController::class, 'index'])->name('games.index');
        Route::get('/dive', [GameController::class, 'dive'])->name('games.dive');

        Route::prefix('battleball')->group(function () {
            Route::get('/', [GameController::class, 'battleballIndex'])->name('games.battleball.index');
            Route::get('/how_to_play', [GameController::class, 'battleballHowToPlay'])->name('games.battleball.how_to_play');
            Route::get('/high_scores', [GameController::class, 'battleballHighScores'])->name('games.battleball.high_scores');
            Route::get('/challenge', [GameController::class, 'battleballChallenge'])->name('games.battleball.challenge');
        });

        Route::prefix('snowstorm')->group(function () {
            Route::get('/', [GameController::class, 'snowstormIndex'])->name('games.snowstorm.index');
            Route::get('/rules', [GameController::class, 'snowstormRules'])->name('games.snowstorm.rules');
            Route::get('/high_scores', [GameController::class, 'snowstormHighScores'])->name('games.snowstorm.high_scores');
        });

        Route::prefix('wobblesquabble')->group(function () {
            Route::get('/', [GameController::class, 'wobblesquabbleIndex'])->name('games.wobblesquabble.index');
            Route::get('/high_scores', [GameController::class, 'wobblesquabbleHighScores'])->name('games.wobblesquabble.high_scores');
        });
    });

    //CreditsController
    Route::prefix('credits')->group(function () {
        Route::get('/', [CreditsController::class, 'index'])->name('credits.index');
        Route::get('/status', [CreditsController::class, 'getPaymentStatus'])->name('credits.status');
        Route::get('/buy/{offer?}', [CreditsController::class, 'buySetup'])->name('credits.buy.setup');
        Route::get('/transactions', [CreditsController::class, 'transactions'])->name('credits.transactions');
        Route::prefix('furniture')->group(function () {
            Route::get('/', [CreditsController::class, 'furniture'])->name('credits.furniture');
            Route::get('/catalogue', [CreditsController::class, 'catalogue'])->name('credits.furniture.catalogue');
            Route::get('/catalogue/{id}', [CreditsController::class, 'catalogue']);
            Route::get('/decoration_examples', [CreditsController::class, 'decorationExamples']);
            Route::get('/starterpacks', [CreditsController::class, 'starterPacks']);
            Route::get('/trading', [CreditsController::class, 'trading']);
            Route::get('/exchange', [CreditsController::class, 'exchange']);
            Route::get('/cameras', [CreditsController::class, 'cameras']);
            Route::get('/ecotronfaq', [CreditsController::class, 'ecotronfaq']);
        });
        Route::get('/collectibles', [CreditsController::class, 'collectibles']);
    });

    //GroupController
    Route::prefix('groups')->group(function () {
        Route::get('/{url}', [GroupController::class, 'groupUrl'])->name('groups.page.url');
        Route::get('/{id}/id', [GroupController::class, 'groupId'])->name('groups.page.id');
        Route::get('/{id}/id/discussions', [GroupController::class, 'discussions'])->name('groups.discussions');
        Route::get('/{groupId}/id/discussions/{topicId}/id', [DiscussionController::class, 'viewTopic'])->name('groups.topic.view');
    });

    Route::prefix('discussions')->group(function() {
        Route::prefix('actions')->group(function() {
            Route::post('/newtopic', [DiscussionController::class, 'newTopic'])->name('discussions.actions.newtopic');
            Route::post('/previewtopic', [DiscussionController::class, 'previewTopic'])->name('discussions.actions.previewtopic');
            Route::post('/savetopic', [DiscussionController::class, 'saveTopic'])->name('discussions.actions.savetopic');
            Route::post('/previewpost', [DiscussionController::class, 'previewPost'])->name('discussions.actions.previewpost');
            Route::post('/savepost', [DiscussionController::class, 'savePost'])->name('discussions.actions.savepost');
            Route::post('/deletepost', [DiscussionController::class, 'deletePost'])->name('discussions.actions.deletepost');
        });
    });

    //HelpController
    Route::prefix('help')->group(function () {
        Route::get('/', [HelpController::class, 'index'])->name('help.index');
        Route::get('/hotel_way', [HelpController::class, 'hotelWay'])->name('help.hotel_way');
        Route::get('/tool', [HelpController::class, 'tool'])->name('help.tool');
        Route::get('/contact_us', [HelpController::class, 'contactUs'])->name('help.contact_us');
    });

    Route::prefix('iot')->group(function () {
        Route::get('/go', [HelpController::class, 'iotGo'])->name('iot.go');
    });

    Route::get('/home/{username?}', [HomeController::class, 'home'])->name('home.user.username');
    Route::get('/home/{id}/id', [HomeController::class, 'homeId'])->name('home.user.id');

    Route::prefix('myhabbo')->group(function () {
        Route::post('/avatarlist/avatarinfo', [WidgetController::class, 'avatarInfo'])->name('myhabbo.avatarlist.avatarinfo');
        Route::post('/avatarlist/friendsearchpaging', [WidgetController::class, 'friendsPaging'])->name('myhabbo.avatarlist.friend_search');
        Route::post('/badgelist/badgepaging', [WidgetController::class, 'badgePaging'])->name('myhabbo.badgelist.badgepaging');
        Route::post('/friends/add', [WidgetController::class, 'friendsAdd'])->name('myhabbo.friends.add');
        Route::post('/friends/request', [WidgetController::class, 'friendsRequest'])->name('myhabbo.friends.request');
        Route::post('/friends_ajax', [WidgetController::class, 'friendsAjax'])->name('myhabbo.friends.ajax');
        Route::post('/guestbook/add', [WidgetController::class, 'guestbookAdd'])->name('myhabbo.guestbook.add');
        Route::post('/guestbook/preview', [WidgetController::class, 'guestbookPreview'])->name('myhabbo.guestbook.preview');
        Route::post('/guestbook/remove', [WidgetController::class, 'guestbookRemove'])->name('myhabbo.guestbook.remove');
        Route::post('/guestbook/list', [WidgetController::class, 'guestbookList'])->name('myhabbo.guestbook.list');
        Route::post('/groups/groupinfo', [WidgetController::class, 'groupInfo'])->name('myhabbo.groups.groupinfo');
        Route::post('/rating/rate', [WidgetController::class, 'ratingsRate'])->name('myhabbo.rating.rate');
        Route::post('/widget/delete', [WidgetController::class, 'widgetDelete'])->name('myhabbo.widget.delete');
        Route::post('/rating/reset_ratings', [WidgetController::class, 'ratingsReset'])->name('myhabbo.rating.reset');

        Route::post('/noteeditor/editor', [NoteEditorController::class, 'editor'])->name('myhabbo.noteeditor.editor');
        Route::post('/noteeditor/preview', [NoteEditorController::class, 'preview'])->name('myhabbo.noteeditor.preview');
        Route::post('/noteeditor/place', [NoteEditorController::class, 'place'])->name('myhabbo.noteeditor.place');
        Route::post('/sticker/place_sticker', [HomeController::class, 'placeSticker'])->name('myhabbo.sticker.place_sticker');
        Route::post('/sticker/remove_sticker', [HomeController::class, 'removeSticker'])->name('myhabbo.sticker.remove_sticker');
        Route::post('/stickie/edit', [HomeController::class, 'skinEdit'])->name('myhabbo.stickie.edit');
        Route::post('/stickie/delete', [HomeController::class, 'deleteStickie'])->name('myhabbo.stickie.delete');
        Route::post('/widget/edit', [HomeController::class, 'skinEdit'])->name('myhabbo.widget.edit');
        Route::post('/cancel', [HomeController::class, 'cancelHome'])->name('myhabbo.cancel');
        Route::post('/save/{id}', [HomeController::class, 'saveHome'])->name('myhabbo.save');
        Route::get('/startSession/{homeId}', [HomeController::class, 'startSession'])->name('myhabbo.startSession');

        Route::post('/store/background_warning', [HomeController::class, 'backgroundWarning'])->name('myhabbo.store.background_warning');
        Route::post('/store/main', [HomeController::class, 'storeMain'])->name('myhabbo.store.main');
        Route::post('/store/inventory', [HomeController::class, 'inventoryMain'])->name('myhabbo.inventory.main');
        Route::post('/store/inventory_items', [HomeController::class, 'inventoryItems'])->name('myhabbo.inventory.items');
        Route::post('/store/inventory_preview', [HomeController::class, 'inventoryPreview'])->name('myhabbo.inventory.preview');
        Route::post('/store/items', [HomeController::class, 'getStoreItems'])->name('myhabbo.store.main');
        Route::post('/store/preview', [HomeController::class, 'previewItem'])->name('myhabbo.item.preview');
        Route::post('/store/purchase_confirm', [HomeController::class, 'purchaseConfirm'])->name('myhabbo.item.purchase_confirm');
        Route::post('/store/purchase_stickers', [HomeController::class, 'purchaseDone'])->name('myhabbo.item.purchase_done');

        Route::get('/trax_song/{id}', [WidgetController::class, 'getTraxSong'])->name('myhabbo.trax_song.get');
        Route::post('/traxplayer/select_song', [WidgetController::class, 'saveTraxSong'])->name('myhabbo.trax_song.select_song');

        Route::post('/photo/like', [WidgetController::class, 'photoLike'])->name('myhabbo.photo.like');

        Route::post('/linktool/search', [CommunityController::class, 'linktoolSearch'])->name('myhabbo.linktool.search');
    });

    Route::prefix('habblet')->group(function() {
        Route::post('/ajax/collectiblesConfirm', [CreditsController::class, 'habbletAjaxCollectiblesConfirm'])->name('habblet.ajax.collectibles.confirm');
        Route::post('/ajax/collectiblesPurchase', [CreditsController::class, 'habbletAjaxCollectiblesPurchase'])->name('habblet.ajax.collectibles.purchase');

        Route::post('/ajax/redeemVoucher', [CreditsController::class, 'redeemVoucher'])->name('habblet.ajax.redeem.voucher');
    });

    Route::post('/furnipurchase/purchase_confirmation', [CreditsController::class, 'purchaseConfirmation'])->name('furnipurchase.purchase_confirmation');
    Route::post('/furnipurchase/purchase', [CreditsController::class, 'purchase'])->name('furnipurchase.purchase');

    Route::post('/grouppurchase/group_create_form', [GroupController::class, 'groupCreateForm'])->name('grouppurchase.group_create_form');
    Route::post('/grouppurchase/purchase_confirmation', [GroupController::class, 'groupPurchaseConfirmation'])->name('grouppurchase.purchase_confirmation');
    Route::post('/grouppurchase/purchase_ajax', [GroupController::class, 'groupPurchaseAjax'])->name('grouppurchase.purchase_ajax');


    Route::prefix('components')->group(function () {
        Route::get('/roomNavigation', [ClientController::class, 'roomNavigation'])->name('components.room_navigation');
        Route::post('/scores', [GameController::class, 'scores'])->name('components.scores');
    });

    Route::prefix('client')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('client.index');
        Route::post('/', [ClientController::class, 'clientError'])->name('client.error');
        Route::get('/disconnected', [ClientController::class, 'disconnected'])->name('client.disconnected');
    });

    Route::post('/habblet/ajax/updateHabboCount', [ClientController::class, 'updateHabboCount'])->name('client.updateHabboCount');
});

Route::middleware('auth')->group(function () {
    Route::post('/topbar/credits', [ClientController::class, 'topbarCredits'])->name('topbar.credits');
    Route::post('/topbar/habboclub', [ClientController::class, 'topbarHabboclub'])->name('topbar.habboclub');

    Route::prefix('profile')->group(function () {
        Route::get('/{page?}', [ProfileController::class, 'figure'])->name('profile.figure');
        Route::post('/{page?}', [ProfileController::class, 'save'])->name('profile.save');
    });

    Route::prefix('mod')->group(function() {
        Route::post('/add_discussionpost_report', [ReportController::class, 'addDiscussionpostReport'])->name('mod.add_discussionpost_report');
        Route::post('/add_guestbook_report', [ReportController::class, 'addGuestbookReport'])->name('mod.add_guestbook_report');
        Route::post('/add_name_report', [ReportController::class, 'addNameReport'])->name('mod.add_name_report');
        Route::post('/add_stickie_report', [ReportController::class, 'addStickieReport'])->name('mod.add_stickie_report');
    });

});

Route::middleware('guest')->group(function () {
    Route::prefix('register')->group(function () {
        Route::get('/username', [AuthController::class, 'checkUsername']);
        Route::post('/start', [AuthController::class, 'registerStart'])->name('auth.register.start');
        Route::post('/step/2', [AuthController::class, 'registerStepTwoVerify'])->name('auth.register.step_2');

        Route::get('/step/2', [AuthController::class, 'registerStepTwo'])->name('auth.register.step_2');
        Route::post('/step/3', [AuthController::class, 'registerStepThreeVerify'])->name('auth.register.step_3');

        Route::get('/step/3', [AuthController::class, 'registerStepThree'])->name('auth.register.step_3');
        Route::post('/step/4', [AuthController::class, 'registerStepFourVerify'])->name('auth.register.step_4');

        Route::get('/step/4', [AuthController::class, 'registerStepFour'])->name('auth.register.step_4');
        Route::post('/done', [AuthController::class, 'registerDone'])->name('auth.register.done');

        Route::get('/done', [AuthController::class, 'registerDoneRedirect'])->name('auth.register.done');
    });
    Route::prefix('account')->group(function () {
        Route::get('/password/forgot', [AuthController::class, 'forgotPassword'])->name('auth.password.forgot');
        Route::post('/password/forgot', [AuthController::class, 'forgotPasswordMyAccounts'])->name('auth.password.send');
        Route::get('/password/reset/{token}', [AuthController::class, 'forgotPasswordReset'])->name('auth.password.reset');
        Route::post('/password/reset', [AuthController::class, 'forgotPasswordCheck'])->name('auth.password.check');

        Route::post('/forgot', [AuthController::class, 'forgotPasswordMyAccounts'])->name('auth.password.forgot');
        Route::get('/forgot', [AuthController::class, 'emailForgotPassword'])->name('auth.forgot');
        Route::post('submit', [AuthController::class, 'doLogin'])->name('account.submit');

        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    });

    Route::prefix('housekeeping')->group(function () {
        Route::get('login', [HousekeepingAuthController::class, 'login'])->name('housekeeping.account.login');
        Route::post('account/submit', [HousekeepingAuthController::class, 'doLogin'])->name('housekeeping.account.submit');
    });

});

//Admin routes
Route::middleware('admin')->group(function () {

    Route::prefix('housekeeping')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('housekeeping.index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('housekeeping.index');
        Route::post('/dashboard', [DashboardController::class, 'saveNote'])->name('housekeeping.save_note');

        Route::prefix('settings')->group(function() {
            Route::get('/hotel', [SettingsController::class, 'hotel'])->name('housekeeping.settings.hotel');
            Route::post('/hotel', [SettingsController::class, 'hotelSave'])->name('housekeeping.settings.hotel.save');
            Route::get('/site', [SettingsController::class, 'site'])->name('housekeeping.settings.site');
            Route::post('/site', [SettingsController::class, 'siteSave'])->name('housekeeping.settings.site.save');
        });

        Route::prefix('server')->group(function () {
            Route::get('/', [ServerGeneralController::class, 'index'])->name('housekeeping.server');
            Route::post('/', [ServerGeneralController::class, 'serverSave'])->name('housekeeping.server.save');

            //Route::get('/startup', [ServerController::class, 'serverStartup'])->name('housekeeping.server.startup');
            //Route::post('/startup', [ServerController::class, 'serverStartupInit'])->name('housekeeping.server.startup');

            // Kepler does not have wordfilter
            //Route::get('/wordfilter', [ServerController::class, 'wordfilter'])->name('housekeeping.server.wordfilter');
            //Route::post('/wordfilter', [ServerController::class, 'wordfilterSave'])->name('housekeeping.server.wordfilter.save');
            //Route::get('/wordfilter/add', [ServerController::class, 'wordfilterAdd'])->name('housekeeping.server.wordfilter.add');
            //Route::post('/wordfilter/add', [ServerController::class, 'wordfilterCreate'])->name('housekeeping.server.wordfilter.add');
            //Route::get('/wordfilter/{word}', [ServerController::class, 'wordfilter'])->name('housekeeping.server.wordfilter.edit');
            //Route::post('/wordfilter/{word}', [ServerController::class, 'wordfilterEditSave'])->name('housekeeping.server.wordfilter_edit.save');
            //Route::get('/wordfilter/{word}/delete', [ServerController::class, 'wordfilterDelete'])->name('housekeeping.server.wordfilter.delete');
            Route::get('/welcomemsg', [ServerGeneralController::class, 'welcomemsg'])->name('housekeeping.server.welcomemsg');
            Route::post('/welcomemsg', [ServerGeneralController::class, 'welcomemsgSave'])->name('housekeeping.server.welcomemsg.save');
        });

        Route::prefix('furniture')->group(function() {
            Route::get('/catalogue', [CatalogueController::class, 'catalogue'])->name('housekeeping.furniture.catalogue.pages');
            Route::get('/catalogue/edit/{id}', [CatalogueController::class, 'catalogueEdit'])->name('housekeeping.furniture.catalogue.pages.edit');
            Route::post('/catalogue/save', [CatalogueController::class, 'catalogueSave'])->name('housekeeping.furniture.catalogue.pages.save');
            Route::get('/catalogue/add', [CatalogueController::class, 'catalogueAdd'])->name('housekeeping.furniture.catalogue.pages.add');
            Route::post('/catalogue/add', [CatalogueController::class, 'catalogueAddSave'])->name('housekeeping.furniture.catalogue.pages.add');
            Route::post('/catalogue/delete', [CatalogueController::class, 'catalogueDelete'])->name('housekeeping.furniture.catalogue.pages.delete');

            Route::get('/catalogue/items', [CatalogueController::class, 'catalogueItems'])->name('housekeeping.furniture.catalogue.items');
            Route::get('/catalogue/items/edit/{id}', [CatalogueController::class, 'catalogueItemsEdit'])->name('housekeeping.furniture.catalogue.items.edit');
            Route::post('/catalogue/items/save', [CatalogueController::class, 'catalogueItemsSave'])->name('housekeeping.furniture.catalogue.items.save');
            Route::get('/catalogue/items/add', [CatalogueController::class, 'catalogueItemsAdd'])->name('housekeeping.furniture.catalogue.items.add');
            Route::post('/catalogue/items/add', [CatalogueController::class, 'catalogueItemsAddSave'])->name('housekeeping.furniture.catalogue.items.add');
            Route::post('/catalogue/items/delete', [CatalogueController::class, 'catalogueItemsDelete'])->name('housekeeping.furniture.catalogue.items.delete');

            Route::get('/catalogue/packages', [CatalogueController::class, 'cataloguePackages'])->name('housekeeping.furniture.catalogue.packages');
            Route::get('/catalogue/packages/edit/{id}', [CatalogueController::class, 'cataloguePackagesEdit'])->name('housekeeping.furniture.catalogue.packages.edit');
            Route::post('/catalogue/packages/save', [CatalogueController::class, 'cataloguePackagesSave'])->name('housekeeping.furniture.catalogue.packages.save');
            Route::get('/catalogue/packages/add', [CatalogueController::class, 'cataloguePackagesAdd'])->name('housekeeping.furniture.catalogue.packages.add');
            Route::post('/catalogue/packages/add', [CatalogueController::class, 'cataloguePackagesAddSave'])->name('housekeeping.furniture.catalogue.packages.add');
            Route::post('/catalogue/packages/delete', [CatalogueController::class, 'cataloguePackagesDelete'])->name('housekeeping.furniture.catalogue.packages.delete');

            Route::get('/items', [FurnitureController::class, 'items'])->name('housekeeping.furniture.items');
            Route::get('/items/edit/{id}', [FurnitureController::class, 'furnitureEdit'])->name('housekeeping.furniture.items.edit');
            Route::post('/items/save', [FurnitureController::class, 'furnitureSave'])->name('housekeeping.furniture.items.save');
            Route::get('/items/add', [FurnitureController::class, 'furnitureAdd'])->name('housekeeping.furniture.items.add');
            Route::post('/items/add', [FurnitureController::class, 'furnitureAddSave'])->name('housekeeping.furniture.items.add');
            Route::post('/items/delete', [FurnitureController::class, 'furnitureDelete'])->name('housekeeping.furniture.items.delete');

            Route::get('/weboffers', [WebOfferController::class, 'webOffers'])->name('housekeeping.furniture.weboffers');
            Route::get('/weboffers/edit/{id}', [WebOfferController::class, 'webOffersEdit'])->name('housekeeping.furniture.weboffers.edit');
            Route::post('/weboffers/save', [WebOfferController::class, 'webOffersSave'])->name('housekeeping.furniture.weboffers.save');
            Route::get('/weboffers/add', [WebOfferController::class, 'webOffersAdd'])->name('housekeeping.furniture.weboffers.add');
            Route::post('/weboffers/add', [WebOfferController::class, 'webOffersAddSave'])->name('housekeeping.furniture.weboffers.add');
            Route::post('/weboffers/delete', [WebOfferController::class, 'webOffersDelete'])->name('housekeeping.furniture.weboffers.delete');

        });

        Route::prefix('site')->group(function () {
            Route::get('/', [SiteController::class, 'index'])->name('housekeeping.site');
            Route::post('/', [SiteController::class, 'siteSave'])->name('housekeeping.site.save');

            Route::get('/ads', [AdvertisementController::class, 'siteAds'])->name('housekeeping.site.ads');
            Route::post('/ads', [AdvertisementController::class, 'siteAdsSave'])->name('housekeeping.site.ads.save');
            Route::post('/tracking', [AdvertisementController::class, 'siteTrackingSave'])->name('housekeeping.site.tracking.save');

            Route::get('/maintenance', [SiteController::class, 'maintenance'])->name('housekeeping.site.maintenance');
            Route::post('/maintenance', [SiteController::class, 'maintenanceSave'])->name('housekeeping.site.maintenance.save');
            Route::get('/loader', [SiteController::class, 'loader'])->name('housekeeping.site.loader');
            Route::post('/loader', [SiteController::class, 'loaderSave'])->name('housekeeping.site.loader.save');

            //Maybe in future :v
            //Route::get('/site/collectables', 'welcomemsg')->name('admin.site.collectables');
            //Route::post('/site/collectables', 'welcomemsgSave')->name('admin.site.collectables.save');
            //Route::get('/site/collectables_edit', 'welcomemsg')->name('admin.site.collectables_edit');
            //Route::post('/site/collectables_edit', 'welcomemsgSave')->name('admin.site.collectables_edit.save');

            //Route::get('/site/content', 'welcomemsg')->name('admin.site.content');
            //Route::post('/site/content', 'welcomemsgSave')->name('admin.site.content.save');
            //Route::get('/site/banners', 'welcomemsg')->name('admin.site.banners');
            //Route::post('/site/banners', 'welcomemsgSave')->name('admin.site.banners.save');
            //Route::get('/site/add_homes', 'welcomemsg')->name('admin.site.add_homes');
            //Route::post('/site/add_homes', 'welcomemsgSave')->name('admin.site.add_homes.save');
            //Route::get('/site/faq', 'welcomemsg')->name('admin.site.faq');
            //Route::post('/site/faq', 'welcomemsgSave')->name('admin.site.faq.save');
            //Route::get('/site/newsletter', 'welcomemsg')->name('admin.site.newsletter');
            //Route::post('/site/newsletter', 'welcomemsgSave')->name('admin.site.newsletter.save');
            Route::get('/articles/create', [HousekeepingArticleController::class, 'articleCreate'])->name('housekeeping.site.articles.create');
            Route::post('/articles/create', [HousekeepingArticleController::class, 'articleCreateSave'])->name('housekeeping.site.articles.create.save');
            Route::get('/articles', [HousekeepingArticleController::class, 'articles'])->name('housekeeping.site.articles');
            Route::get('/articles/edit/{id}', [HousekeepingArticleController::class, 'articleEdit'])->name('housekeeping.site.articles.edit');
            Route::post('/articles/edit/{id}', [HousekeepingArticleController::class, 'articleEditSave'])->name('housekeeping.site.articles.edit.save');
            Route::post('/articles/delete', [HousekeepingArticleController::class, 'articleDelete'])->name('housekeeping.site.articles.delete');

            Route::get('/boxes/create', [BoxController::class, 'boxCreate'])->name('housekeeping.site.boxes.create');
            Route::post('/boxes/create', [BoxController::class, 'boxCreateSave'])->name('housekeeping.site.boxes.create.save');
            Route::get('/boxes/manage', [BoxController::class, 'boxManage'])->name('housekeeping.site.boxes');
            Route::get('/boxes/edit/{id}', [BoxController::class, 'boxEdit'])->name('housekeeping.site.boxes.edit');
            Route::post('/boxes/edit/save', [BoxController::class, 'boxEditSave'])->name('housekeeping.site.boxes.edit.save');
            Route::post('/boxes/delete', [BoxController::class, 'boxDelete'])->name('housekeeping.site.boxes.delete');

            Route::get('/boxes/pages/create', [BoxController::class, 'boxPagesCreate'])->name('housekeeping.site.boxes.pages.create');
            Route::post('/boxes/pages/create', [BoxController::class, 'boxPagesCreateSave'])->name('housekeeping.site.boxes.pages.create.save');
            Route::get('/boxes/pages', [BoxController::class, 'boxPagesManage'])->name('housekeeping.site.boxes.pages');
            Route::get('/boxes/pages/edit/{id}', [BoxController::class, 'boxPagesEdit'])->name('housekeeping.site.boxes.pages.edit');
            Route::post('/boxes/pages/save', [BoxController::class, 'boxPagesSave'])->name('housekeeping.site.boxes.pages.edit.save');
            Route::post('/boxes/pages/delete', [BoxController::class, 'boxPageDelete'])->name('housekeeping.site.boxes.pages.delete');

            Route::get('/menu/categories', [MenuController::class, 'menuCategoriesListing'])->name('housekeeping.site.menu.categories.listing');
            Route::get('/menu/categories/create', [MenuController::class, 'menuCategoriesCreate'])->name('housekeeping.site.menu.categories.create');
            Route::post('/menu/categories/create', [MenuController::class, 'menuCategoriesCreateSave'])->name('housekeeping.site.menu.categories.create');
            Route::get('/menu/categories/edit/{id}', [MenuController::class, 'menuCategoriesEdit'])->name('housekeeping.site.menu.categories.edit');
            Route::post('/menu/categories/save', [MenuController::class, 'menuCategoriesSave'])->name('housekeeping.site.menu.categories.save');
            Route::post('/menu/categories/delete', [MenuController::class, 'menuCategoriesDelete'])->name('housekeeping.site.menu.categories.delete');


            Route::get('/menu/subcategories', [MenuController::class, 'menuSubcategoriesListing'])->name('housekeeping.site.menu.subcategories.listing');
            Route::get('/menu/subcategories/create', [MenuController::class, 'menuSubcategoriesCreate'])->name('housekeeping.site.menu.subcategories.create');
            Route::post('/menu/subcategories/create', [MenuController::class, 'menuSubcategoriesCreateSave'])->name('housekeeping.site.menu.subcategories.create');
            Route::get('/menu/subcategories/edit/{id}', [MenuController::class, 'menuSubcategoriesEdit'])->name('housekeeping.site.menu.subcategories.edit');
            Route::post('/menu/subcategories/save', [MenuController::class, 'menuSubcategoriesSave'])->name('housekeeping.site.menu.subcategories.save');
            Route::post('/menu/subcategories/delete', [MenuController::class, 'menuSubcategoriesDelete'])->name('housekeeping.site.menu.subcategories.delete');
        });

        Route::prefix('neptunecms')->group(function () {
            //NeptuneCMS pages
            Route::get('/', function () { return view('housekeeping.neptunecms.index'); })->name('housekeeping.neptunecms');
            Route::get('/credits', function () { return view('housekeeping.neptunecms.credits'); })->name('housekeeping.neptunecms.credits');
        });

        Route::prefix('users')->group(function () {
            //User Moderation pages
            Route::get('/listing', [UserController::class, 'usersListing'])->name('housekeeping.users.listing');
            Route::get('/edit/{id}', [UserController::class, 'usersEdit'])->name('housekeeping.users.edit');
            Route::post('/edit', [UserController::class, 'usersEditSave'])->name('housekeeping.users.edit.save');
            Route::get('/ips/{value}', [UserController::class, 'usersIPs'])->name('housekeeping.users.ips');

            Route::get('/badges', [UserController::class, 'toolsBadge'])->name('housekeeping.users.tools.badge');
            Route::get('/badges/{id}', [UserController::class, 'toolsBadge'])->name('housekeeping.users.badges');
            Route::post('/badges/give', [UserController::class, 'toolsBadgeGive'])->name('housekeeping.users.badges.give');
            Route::post('/badges/remove', [UserController::class, 'toolsBadgeRemove'])->name('housekeeping.users.badges.remove');

            Route::get('/mass', [UserController::class, 'toolsMass'])->name('housekeeping.users.tools.mass');
            Route::post('/mass', [UserController::class, 'toolsMassPost'])->name('housekeeping.users.tools.mass');
        });

        Route::prefix('editors')->group(function() {
            Route::get('/guestroom/listing', [HousekeepingEditorController::class, 'guestroomListing'])->name('housekeeping.editor.guestroom.listing');
            Route::get('/guestroom/edit/{id}', [HousekeepingEditorController::class, 'guestroomEdit'])->name('housekeeping.editor.guestroom.edit');
            Route::post('/guestroom/edit', [HousekeepingEditorController::class, 'guestroomSave'])->name('housekeeping.editor.guestroom.edit.save');

            Route::get('/publicroom/listing', [HousekeepingEditorController::class, 'publicroomListing'])->name('housekeeping.editor.publicroom.listing');
            Route::get('/publicroom/edit/{id}', [HousekeepingEditorController::class, 'publicroomEdit'])->name('housekeeping.editor.publicroom.edit');
            Route::post('/publicroom/edit', [HousekeepingEditorController::class, 'publicroomSave'])->name('housekeeping.editor.publicroom.edit.save');
            Route::get('/publicroom/add', [HousekeepingEditorController::class, 'publicroomAdd'])->name('housekeeping.editor.publicroom.add');
            Route::post('/publicroom/add', [HousekeepingEditorController::class, 'publicroomAddSave'])->name('housekeeping.editor.publicroom.add.save');
            Route::post('/publicroom/delete', [HousekeepingEditorController::class, 'publicroomDelete'])->name('housekeeping.editor.publicroom.delete');

            Route::get('/navigator', [HousekeepingEditorController::class, 'publicroomAdd'])->name('housekeeping.editor.navigator');
        });

        Route::prefix('credits')->group(function () {
            Route::get('/vouchers', [HousekeepingCreditsController::class, 'vouchers'])->name('housekeeping.credits.vouchers');
            Route::post('/vouchers', [HousekeepingCreditsController::class, 'vouchersAdd'])->name('housekeeping.credits.vouchers.post');
            Route::post('/vouchers/delete', [HousekeepingCreditsController::class, 'vouchersDelete'])->name('housekeeping.credits.vouchers.delete');

            Route::get('/vouchers/history', [HousekeepingCreditsController::class, 'vouchersHistory'])->name('housekeeping.credits.vouchers.history');
        });

        Route::prefix('moderation')->group(function() {
            Route::get('/reports/website', [HouseekeepingReportController::class, 'website'])->name('housekeeping.moderation.reports.website');
            Route::get('/reports/website/view/{id}', [HouseekeepingReportController::class, 'websiteView'])->name('housekeeping.moderation.reports.website.view');
            Route::post('/reports/website/save', [HouseekeepingReportController::class, 'websiteViewSave'])->name('housekeeping.moderation.reports.website.save');
            Route::post('/reports/website/hide', [HouseekeepingReportController::class, 'websiteHide'])->name('housekeeping.moderation.reports.website.hide');

            Route::get('/remote/ban', [RemoteController::class, 'ban'])->name('housekeeping.moderation.remote.ban');
            Route::post('/remote/ban', [RemoteController::class, 'banPost'])->name('housekeeping.moderation.remote.ban');
            Route::get('/unban', [RemoteController::class, 'unban'])->name('housekeeping.moderation.unban');
            Route::post('/unban', [RemoteController::class, 'unbanPost'])->name('housekeeping.moderation.unban');
        });

        Route::prefix('logs')->group(function() {
            Route::get('staff', [LogController::class, 'staff'])->name('housekeeping.logs.staff');
            Route::post('staff/details', [LogController::class, 'staffMessageDetails'])->name('housekeeping.logs.staff.details');
            Route::post('staff/clear', [LogController::class, 'staffClear'])->name('housekeeping.logs.staff.clear');

            Route::get('bans', [LogController::class, 'bans'])->name('housekeeping.logs.bans');
            Route::get('alerts', [LogController::class, 'alerts'])->name('housekeeping.logs.alerts');

            Route::get('chats', [LogController::class, 'chats'])->name('housekeeping.logs.chats');
            Route::get('console', [LogController::class, 'console'])->name('housekeeping.logs.console');
        });

        Route::prefix('help')->group(function () {
            Route::get('/', [HelpController::class, 'index'])->name('housekeeping.help.index');
        });

        Route::post('furnipicker', [FurniPickerController::class, 'listing'])->name('furnipicker.listing');
        Route::post('furnipicker/search', [FurniPickerController::class, 'search'])->name('furnipicker.search');
    });
});


Route::prefix('habbo-imaging')->group(function() {
    Route::get('/avatarimage{figure?}', [HabboImaging::class, 'avatarimage'])->name('habboimaging.avatarimage');
    Route::get('/badge/{badge}', [HabboImaging::class, 'badge'])->name('habboimaging.badge');
});

Route::fallback(function(){
    return view('errors.404');
});
