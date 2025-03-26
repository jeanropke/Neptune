<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ModerationController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HabboImaging;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\Home\WidgetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
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
        //Route::get('/photos', [CommunityController::class, 'photos'])->name('community.photos');
        //Route::get('/photo/{id}', [CommunityController::class, 'photo'])->name('community.photo');
    });

    Route::prefix('games')->group(function () {
        Route::get('/', [GameController::class, 'index'])->name('games.index');
    });

    //CreditsController
    Route::prefix('credits')->group(function () {
        Route::get('/', [CreditsController::class, 'index'])->name('credits.index');
        Route::get('/status', [CreditsController::class, 'getPaymentStatus'])->name('credits.status');
        Route::get('/buy/{offer?}', [CreditsController::class, 'buySetup'])->name('credits.buy.setup');
        Route::get('/transactions', [CreditsController::class, 'transactions'])->name('credits.transactions');
        Route::get('/furniture', [CreditsController::class, 'furniture'])->name('credits.furniture');
        Route::get('/furniture/catalogue', [CreditsController::class, 'catalogue'])->name('credits.furniture.catalogue');
        Route::get('/furniture/catalogue/{id}', [CreditsController::class, 'catalogue']);
        Route::get('/furniture/decoration_examples', [CreditsController::class, 'decorationExamples']);
        Route::get('/currency', [CreditsController::class, 'currency']);
        Route::get('/collectibles', [CreditsController::class, 'collectibles']);
        Route::get('/mystery', [CreditsController::class, 'mystery']);
        Route::post('/mystery/redeem', [CreditsController::class, 'mysteryRedeem']);
    });

    //GroupController
    Route::prefix('groups')->group(function () {
        Route::get('/{url}', [GroupController::class, 'groupUrl'])->name('groups.page.url');
        Route::get('/{id}/id', [GroupController::class, 'groupId'])->name('groups.page.id');
        Route::get('/{id}/id/discussions', [GroupController::class, 'discussions'])->name('groups.discussions');
        Route::get('/{id}/id/discussions/{discussionId}/id', [GroupController::class, 'thread'])->name('groups.thread');
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

        Route::post('/noteeditor/editor', [HomeController::class, 'noteEditor'])->name('myhabbo.noteeditor.editor');
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
    });

    Route::prefix('habblet')->group(function() {
        Route::post('/ajax/collectiblesConfirm', [CreditsController::class, 'habbletAjaxCollectiblesConfirm'])->name('habblet.ajax.collectibles.confirm');
        Route::post('/ajax/collectiblesPurchase', [CreditsController::class, 'habbletAjaxCollectiblesPurchase'])->name('habblet.ajax.collectibles.purchase');

        Route::post('/ajax/redeemVoucher', [CreditsController::class, 'redeemVoucher'])->name('habblet.ajax.redeem.voucher');
    });


    Route::post('/grouppurchase/group_create_form', [GroupController::class, 'groupCreateForm'])->name('grouppurchase.group_create_form');
    Route::post('/grouppurchase/purchase_confirmation', [GroupController::class, 'groupPurchaseConfirmation'])->name('grouppurchase.purchase_confirmation');
    Route::post('/grouppurchase/purchase_ajax', [GroupController::class, 'groupPurchaseAjax'])->name('grouppurchase.purchase_ajax');

    Route::get('/components/roomNavigation', [ClientController::class, 'roomNavigation'])->name('client.room.navigation');

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
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');

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
    });
});

//Admin routes
Route::middleware('admin')->group(function () {

    Route::prefix('housekeeping')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('housekeeping.index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('housekeeping.index');
        Route::post('/dashboard', [DashboardController::class, 'saveNote'])->name('housekeeping.save_note');
        Route::get('/updates', [DashboardController::class, 'updates'])->name('housekeeping.updates');
        Route::get('/about', [DashboardController::class, 'about'])->name('housekeeping.about');

        Route::prefix('settings')->group(function() {
            Route::get('/hotel', [SettingsController::class, 'hotel'])->name('housekeeping.settings.hotel');
            Route::post('/hotel', [SettingsController::class, 'hotelSave'])->name('housekeeping.settings.hotel.save');
            Route::get('/site', [SettingsController::class, 'site'])->name('housekeeping.settings.site');
            Route::post('/site', [SettingsController::class, 'siteSave'])->name('housekeeping.settings.site.save');
        });

        Route::get('/logs', [AdminController::class, 'logs'])->name('housekeeping.logs');

        Route::get('/theme/update', [AdminController::class, 'themeUpdate']);

        Route::prefix('server')->group(function () {
            Route::get('/', [ServerController::class, 'index'])->name('admin.server');
            Route::post('/', [ServerController::class, 'serverSave'])->name('admin.server.save');

            Route::get('/startup', [ServerController::class, 'serverStartup'])->name('admin.server.startup');
            Route::post('/startup', [ServerController::class, 'serverStartupInit'])->name('admin.server.startup');

            Route::get('/wordfilter', [ServerController::class, 'wordfilter'])->name('admin.server.wordfilter');
            Route::post('/wordfilter', [ServerController::class, 'wordfilterSave'])->name('admin.server.wordfilter.save');
            Route::get('/wordfilter/add', [ServerController::class, 'wordfilterAdd'])->name('admin.server.wordfilter.add');
            Route::post('/wordfilter/add', [ServerController::class, 'wordfilterCreate'])->name('admin.server.wordfilter.add');
            Route::get('/wordfilter/{word}', [ServerController::class, 'wordfilter'])->name('admin.server.wordfilter.edit');
            Route::post('/wordfilter/{word}', [ServerController::class, 'wordfilterEditSave'])->name('admin.server.wordfilter_edit.save');
            Route::get('/wordfilter/{word}/delete', [ServerController::class, 'wordfilterDelete'])->name('admin.server.wordfilter.delete');
            Route::get('/welcomemsg', [ServerController::class, 'welcomemsg'])->name('admin.server.welcomemsg');
            Route::post('/welcomemsg', [ServerController::class, 'welcomemsgSave'])->name('admin.server.welcomemsg.save');

            Route::get('/furnidata', [ServerController::class, 'furnidata'])->name('admin.server.furnidata');
            Route::post('/furnidata', [ServerController::class, 'furnidataGenerate'])->name('admin.server.furnidata.generate');
            Route::get('/productdata', [ServerController::class, 'productdata'])->name('admin.server.productdata');
            Route::post('/productdata', [ServerController::class, 'productdataGenerate'])->name('admin.server.productdata.generate');
            Route::get('/texts', [ServerController::class, 'textsOverride'])->name('admin.server.texts');
            Route::post('/texts/add', [ServerController::class, 'textsAdd'])->name('admin.server.texts.add');
            Route::get('/texts/{id}', [ServerController::class, 'textsOverride'])->name('admin.server.texts.edit');
            Route::get('/texts/delete/{id}', [ServerController::class, 'textsDelete'])->name('admin.server.texts.delete');
            Route::post('/texts', [ServerController::class, 'textsGenerate'])->name('admin.server.texts.generate');
        });
        Route::prefix('catalogue')->group(function () {
            Route::get('/', [CatalogueController::class, 'index'])->name('admin.catalogue');
            Route::get('/pages/edit/{id}', [CatalogueController::class, 'catalogPageEdit'])->name('admin.catalogue.pages.edit');
            Route::post('/pages/save', [CatalogueController::class, 'catalogPageSave'])->name('admin.catalogue.pages.save');

            Route::get('/items/{id?}', [CatalogueController::class, 'catalogItems'])->name('admin.catalogue.items');
            Route::get('/items/edit/{id}', [CatalogueController::class, 'catalogItemsEdit'])->name('admin.catalogue.items.edit');
            Route::post('/items/save', [CatalogueController::class, 'catalogItemsSave'])->name('admin.catalogue.items.save');

            Route::get('/furni/edit/{id}', [CatalogueController::class, 'catalogFurniEdit'])->name('admin.catalogue.furni.edit');
            Route::post('/furni/save', [CatalogueController::class, 'catalogFurniSave'])->name('admin.catalogue.furni.save');


            Route::post('/furni/search', [CatalogueController::class, 'furniSearch'])->name('admin.catalogue.furni.search');

            Route::get('/furni/clothing', [CatalogueController::class, 'clothing'])->name('admin.catalogue.clothing');
            Route::post('/furni/clothing', [CatalogueController::class, 'clothingFix'])->name('admin.catalogue.clothing.fix');

            Route::get('/furni/missing', [CatalogueController::class, 'missingFurni'])->name('admin.catalogue.furni.missing');
            Route::post('/furni/missing', [CatalogueController::class, 'missingFurniChecker'])->name('admin.catalogue.furni.missing.check');

            Route::get('/crafting', [CatalogueController::class, 'crafting'])->name('admin.catalogue.crafting');
            Route::get('/crafting/{altar}', [CatalogueController::class, 'showRecipes'])->name('admin.catalogue.crafting.recipes');
            Route::get('/crafting/recipe/{id}', [CatalogueController::class, 'showRecipe'])->name('admin.catalogue.crafting.recipe');
            Route::get('/crafting/{altar}/add', [CatalogueController::class, 'addCrafting'])->name('admin.catalogue.crafting.recipe.add');
            Route::post('/crafting/save', [CatalogueController::class, 'saveCrafting'])->name('admin.catalogue.crafting.recipe.save');
            Route::post('/crafting/reward/select', [CatalogueController::class, 'rewardSelect'])->name('admin.catalogue.crafting.reward.select');

            Route::get('/crackables', [CatalogueController::class, 'crackables'])->name('admin.catalogue.crackables');
            Route::get('/crackable/{id}', [CatalogueController::class, 'crackables'])->name('admin.catalogue.crackable');
            Route::get('/crackables/add', [CatalogueController::class, 'crackablesAdd'])->name('admin.catalogue.crackables.add');
        });

        Route::prefix('site')->group(function () {
            Route::get('/', [SiteController::class, 'index'])->name('admin.site');
            Route::post('/', [SiteController::class, 'siteSave'])->name('admin.site.save');
            Route::post('/ads', [SiteController::class, 'siteAdsSave'])->name('admin.site.ads.save');
            Route::get('/maintenance', [SiteController::class, 'maintenance'])->name('admin.site.maintenance');
            Route::post('/maintenance', [SiteController::class, 'maintenanceSave'])->name('admin.site.maintenance.save');
            Route::get('/loader', [SiteController::class, 'loader'])->name('admin.site.loader');
            Route::post('/loader', [SiteController::class, 'loaderSave'])->name('admin.site.loader.save');

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
            Route::get('/news_compose', [SiteController::class, 'newsCompose'])->name('admin.site.news_compose');
            Route::post('/news_compose', [SiteController::class, 'newsComposeSave'])->name('admin.site.news_compose.save');
            Route::get('/news_manage', [SiteController::class, 'newsManage'])->name('admin.site.news_manage');
            Route::get('/news_manage/{articleId}', [SiteController::class, 'newsManage'])->name('admin.site.news_manage');
            Route::post('/news_manage/{articleId}', [SiteController::class, 'newsManageSave'])->name('admin.site.news_manage.save');
            Route::get('/news_manage/{articleId}/delete', [SiteController::class, 'newsManageDelete'])->name('admin.site.news_manage.delete');

            Route::get('/box_create', [SiteController::class, 'boxCreate'])->name('admin.site.box_create');
            Route::post('/box_create', [SiteController::class, 'boxCreateSave'])->name('admin.site.box_create.save');
            Route::get('/box_edit', [SiteController::class, 'boxEdit'])->name('admin.site.box_edit');
            Route::get('/box_edit/{boxId}', [SiteController::class, 'boxEdit'])->name('admin.site.box_edit');
            Route::post('/box_edit/{boxId}', [SiteController::class, 'boxEditSave'])->name('admin.site.box_edit.save');
            Route::get('/box_delete/{boxId}', [SiteController::class, 'boxDelete'])->name('admin.site.box_delete');
            Route::get('/box_pages', [SiteController::class, 'boxPages'])->name('admin.site.box_pages');
            Route::get('/box_pages/new', [SiteController::class, 'boxPagesNew'])->name('admin.site.box_pages.new');
            Route::post('/box_pages/new', [SiteController::class, 'boxPagesCreate'])->name('admin.site.box_pages.create');
            Route::get('/box_pages/{boxId}', [SiteController::class, 'boxPages'])->name('admin.site.box_pages');
            Route::post('/box_pages/{boxId}', [SiteController::class, 'boxPagesSave'])->name('admin.site.box_pages.save');
            Route::get('/box_pages/{boxId}/delete', [SiteController::class, 'boxPageDelete'])->name('admin.site.box_pages.delete');
        });

        Route::prefix('solariumcms')->group(function () {
            //SolariumCMS pages
            Route::get('/', function () {
                return view('admin.solariumcms.index');
            })->name('admin.solariumcms');
            Route::get('/credits', function () {
                return view('admin.solariumcms.credits');
            })->name('admin.solariumcms.credits');
        });

        Route::prefix('users')->group(function () {
            //User Moderation pages
            Route::get('/', [ModerationController::class, 'index'])->name('admin.users');
            Route::post('/edit', [ModerationController::class, 'usersEditSearch'])->name('admin.users.edituser.save');
            Route::get('/edit', [ModerationController::class, 'usersEdit'])->name('admin.users.edituser');
            Route::get('/edit/{user}', [ModerationController::class, 'usersEdit'])->name('admin.users.edituser');
            Route::get('/edit/{user}/client', [ModerationController::class, 'usersClient'])->name('admin.users.client');
            Route::get('/ip', [ModerationController::class, 'usersIp'])->name('admin.users.ip');
            Route::post('/ip', [ModerationController::class, 'usersIpSearch'])->name('admin.users.ip');
            Route::get('/search/{value}/ip', [ModerationController::class, 'usersSearch'])->name('admin.users.search.ip');
            Route::get('/search/{value}/machine', [ModerationController::class, 'usersSearch'])->name('admin.users.search.machine');
            Route::get('/search/{value}/username', [ModerationController::class, 'usersSearch'])->name('admin.users.search.username');
            Route::post('/edit/{user}', [ModerationController::class, 'usersEditSave'])->name('admin.users.edituser.save');
            Route::get('/online', [ModerationController::class, 'usersOnline'])->name('admin.users.online');

            Route::get('/badge', [ModerationController::class, 'userBadge'])->name('admin.users.badgetool');
            Route::post('/badge', [ModerationController::class, 'userGiveBadge'])->name('admin.users.badgetool.give');
            Route::get('/mass', [ModerationController::class, 'userMass'])->name('admin.users.massstuff');
            Route::post('/mass/credits', [ModerationController::class, 'userMassCredits'])->name('admin.users.massstuff.credits');
            Route::post('/mass/points', [ModerationController::class, 'userMassPoints'])->name('admin.users.massstuff.points');
            Route::post('/mass/badge', [ModerationController::class, 'userMassBadge'])->name('admin.users.massstuff.badge');
            Route::post('/badge/remove', [ModerationController::class, 'userRemoveBadge'])->name('admin.users.remove.badge');
            Route::post('/mass/removebadge', [ModerationController::class, 'userMassRemoveBadge'])->name('admin.users.massstuff.removebadge');

            Route::get('/editor/guestroom', [ModerationController::class, 'userEditorGuestroom'])->name('admin.users.editor.guestroom');
            Route::get('/editor/guestroom/{roomId}', [ModerationController::class, 'userEditorGuestroom'])->name('admin.users.editor.guestroom');
            Route::post('/editor/guestroom/{roomId}', [ModerationController::class, 'userEditorGuestroomSave'])->name('admin.users.editor.guestroom.save');
        });

        Route::prefix('credits')->group(function () {
            Route::get('/transactions', [ModerationController::class, 'creditsTransactions'])->name('admin.credits.transactions');
            Route::post('/transactions', [ModerationController::class, 'getCreditsTransactions'])->name('admin.credits.transactions.post');
            Route::get('/vouchers', [ModerationController::class, 'creditsVoucher'])->name('admin.credits.vouchers');
            Route::post('/vouchers', [ModerationController::class, 'createCreditsVoucher'])->name('admin.credits.vouchers.post');
        });

        //Route::get('/users/editor/catalogue', 'Admin\CatalogueController@show')->name('admin.users.editor.catalogue');

        Route::prefix('help')->group(function () {
            Route::get('/', [HelpController::class, 'index'])->name('admin.help.index');
        });
    });
});


Route::prefix('habbo-imaging')->group(function() {
    Route::get('/avatarimage{figure?}', [HabboImaging::class, 'avatarimage'])->name('habboimaging.avatarimage');
    Route::get('/badge/{badge}', [HabboImaging::class, 'badge'])->name('habboimaging.badge');
});

Route::fallback(function(){
    return view('errors.404');
});
