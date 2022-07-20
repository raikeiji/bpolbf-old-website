<?php

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
Route::prefix('/')->group(function () {
    Route::get('/','Homepage\HomepageController@index')->name('home');
});
Route::get('lang/{locale}', 'LocalizationController@index');
Route::prefix('investasi')->group(function () {
    Route::get('/','Investasi\InvestasiController@index')->name('investasi');
    Route::get('/berinvestasi','Investasi\InvestasiController@berinvestasi')->name('investasi.berinvestasi');
    Route::get('/pendanaan','Investasi\InvestasiController@pendanaan')->name('investasi.pendanaan');
    Route::get('/investment-opportunity','Investasi\InvestasiController@opportunity')->name('investasi.opportunity');
    Route::get('/how-to-invest','Investasi\InvestasiController@how_to_invest')->name('investasi.how_to_invest');
    Route::get('/bussiness-insiders/{id}','Investasi\InvestasiController@business_insiders')->name('investasi.business_insiders');

    //api to submit invest dan pendanaan
    Route::post('/berinvestasi','Investasi\InvestasiController@berinvestasi_submit')->name('investasi.berinvestasi.submit');
    Route::post('/pendanaan','Investasi\InvestasiController@pendanaan_submit')->name('investasi.pendanaan.submit');
    Route::get('/lang/{locale}', 'LocalizationController@index');
});

Route::prefix('boplbf')->group(function () {
    Route::get('/','Profile\ProfileController@index')->name('boplbf');
    Route::get('/news','Profile\ProfileNewsController@index')->name('boplbf.news');
    Route::get('/news/{id}','Profile\ProfileNewsController@load')->name('boplbf.news.view');
    Route::get('/news/tags/{id}','Profile\ProfileNewsController@search_tag')->name('boplbf.news.view');
    Route::get('/program','Profile\ProfileProgramController@index')->name('boplbf.program');
    Route::get('/program/{id}','Profile\ProfileProgramController@load')->name('boplbf.program.view');
    Route::get('/report','Profile\ProfileReportController@index')->name('boplbf.report');
    Route::get('/report/{id}','Profile\ProfileReportController@load')->name('boplbf.report.view');
    Route::get('/faq','Profile\ProfileFAQController@index')->name('boplbf.faq');
    Route::get('/contact','Profile\ProfileFAQController@contact')->name('boplbf.contact');
    Route::get('/officials','Profile\ProfileOfficialsController@index')->name('boplbf.officials');

    //profile section
    Route::get('/about','Profile\ProfileSectionController@about')->name('boplbf.about');
    Route::get('/vision-mission','Profile\ProfileSectionController@mission')->name('boplbf.mission');
    Route::get('/organization','Profile\ProfileSectionController@organization')->name('boplbf.organization');
    Route::get('/respective','Profile\ProfileSectionController@respective')->name('boplbf.respective');
    Route::get('/lang/{locale}', 'LocalizationController@index');
});

Route::get('/online-registration', function () {
	return redirect('https://registration.labuanbajoflores.id/');
})->name('online_booking');

Route::prefix('tourism')->group(function (){
   Route::get('/','Tourism\IndexController@index')->name('tourism');
   Route::get('/itinerary','Tourism\PackageController@loadItinerary')->name('t.itinarary');
   Route::get('/package/{id}','Tourism\PackageController@loadPackage')->name('t.package');
   Route::get('/announcement','Tourism\AnnouncementController@index')->name('t.announcement');
   Route::get('/announcement/{id}','Tourism\AnnouncementController@load');
   Route::get('/visa-information/{id}','Tourism\InfoController@load');
   Route::get('/thematic-adventure','Tourism\PackageController@loadAdventure')->name('t.adventure');
   Route::get('/thematic-culture','Tourism\PackageController@loadCulture')->name('t.culture');
   Route::get('/thematic-leisure','Tourism\PackageController@loadLeisure')->name('t.leisure');
   Route::get('/things-to-do','Tourism\DestinationController@loadDo')->name('t.d.do');
   Route::get('/things-to-see','Tourism\DestinationController@loadSee')->name('t.d.see');
   Route::get('/things-to-buy','Tourism\DestinationController@loadBuy')->name('t.d.buy');
   Route::get('/destination','Tourism\DestinationController@index')->name('d.destination');
   Route::get('/destination/{id}','Tourism\DestinationController@load')->name('d.pulau_padar');
   Route::get('/artcraft/{id}','Tourism\DestinationController@loadArt')->name('a.load');
   Route::get('/culinary/{id}','Tourism\DestinationController@loadCulinary')->name('c.load');
   Route::get('/calendar-event','Tourism\EventController@index')->name('t.calendar_event');
   Route::get('/detail-event/{id}','Tourism\EventController@load')->name('t.detail_event');
   Route::get('/lang/{locale}', 'LocalizationController@index');
   Route::get('/rumahproduksi/{id}','Tourism\IndexController@rumahProduksiLoad')->name('t.rumah_produksi');
   Route::get('/resto/{id}','Tourism\IndexController@restoLoad')->name('t.resto');
   Route::get('/recomendation','Tourism\TourismRecomendationController@showIndex')->name('t.recomendation');
   
});

Route::prefix('covid')->group(function (){
    Route::get('/','Covid\CovidController@index')->name('covid');
    Route::get('/lang/{locale}', 'LocalizationController@index');
 });

Route::get('cms/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('cms/login','Auth\LoginController@login')->name('login');
Route::get('cms/logout','Auth\LoginController@logout')->name('logout');

Route::prefix('/api')->group(function () {
    Route::post('/faq/submit','Admin\ProfileAPIController@LbftaFAQSubmit')->name('admin.lbfta.faq.submit');
});

Route::group(['prefix' => '/admin-page','middleware' => 'auth'], function() {

    Route::get('/','Admin\SliderController@TourismSlider')->name('admin.t.slider');
    Route::get('/dashboard','Admin\AdminPageController@index')->name('admin.index');
    
    Route::prefix('/profile')->group(function () {
        Route::get('/edit', 'Admin\AdminPageController@EditProfileIndex')->name('admin.edit_profile.index');
        Route::post('/edit', 'Admin\AdminPageController@EditProfileStore')->name('admin.edit_profile.edit');
    });
    
    Route::prefix('/tourism')->group(function () {
        //slider
        Route::get('/slider/download/{id_img}','Admin\SliderController@TourismSliderDownload')->name('admin.t.slider.download');
    	Route::get('/slider/add','Admin\SliderController@TourismSliderAdd')->name('admin.t.slider.add');
        Route::get('/slider/edit/{id}','Admin\SliderController@TourismSliderEdit')->name('admin.t.slider.edit');
        Route::post('/slider/store','Admin\SliderController@TourismSliderAddDB')->name('admin.t.slider.store');
        Route::post('/slider/update','Admin\SliderController@TourismSliderEditDB')->name('admin.t.slider.update');
        Route::post('/slider/delete','Admin\SliderController@TourismSliderDelete')->name('admin.t.slider.delete');
        Route::post('/slider/active','Admin\SliderController@TourismSliderActive')->name('admin.t.slider.active');

        //announcement
    	Route::get('/announcement','Admin\TourismAnnouncementController@TourismPengumuman')->name('admin.t.pengumuman');
    	Route::get('/announcement/add','Admin\TourismAnnouncementController@TourismPengumumanAdd')->name('admin.t.pengumuman.add');
        Route::get('/announcement/edit/{id}','Admin\TourismAnnouncementController@TourismPengumumanEdit')->name('admin.t.pengumuman.edit');
        Route::post('/announcement/update','Admin\TourismAnnouncementController@TourismPengumumanEditDB')->name('admin.t.pengumuman.update');
        Route::post('/announcement/store','Admin\TourismAnnouncementController@TourismPengumumanStore')->name('admin.t.pengumuman.store');
        Route::post('/announcement/delete','Admin\TourismAnnouncementController@TourismPengumumanDelete')->name('admin.t.pengumuman.delete');
        Route::post('/announcement/active','Admin\TourismAnnouncementController@TourismPengumumanActive')->name('admin.t.pengumuman.active');

        //Region
        Route::get('/region','Admin\TourismRegionController@TourismRegion')->name('admin.t.region');
        Route::post('/region/add','Admin\TourismRegionController@TourismRegionAdd')->name('admin.t.region.add');
        Route::post('/region.edit','Admin\TourismRegionController@TourismRegionEdit')->name('admin.t.region.edit');
        Route::post('/region.delete','Admin\TourismRegionController@TourismRegionDelete')->name('admin.t.region.delete');

        //informasi visa
        Route::get('/informasi-visa','Admin\TourismVisaController@TourismInformasiVisa')->name('admin.t.iv');
        Route::get('/informasi-visa/add','Admin\TourismVisaController@TourismInformasiVisaAdd')->name('admin.t.iv.add');
        Route::get('/informasi-visa/edit/{id}','Admin\TourismVisaController@TourismInformasiVisaEdit')->name('admin.t.iv.edit');
        Route::post('/informasi-visa/store','Admin\TourismVisaController@TourismInformasiVisaStore')->name('admin.t.iv.store');
        Route::post('/informasi-visa/storeUpdate','Admin\TourismVisaController@TourismInformasiEditStore')->name('admin.t.iv.storeUpdate');
        Route::post('/informasi-visa/delete','Admin\TourismVisaController@TourismInformasiVisaDelete')->name('admin.t.iv.delete');
        Route::post('/informasi-visa/active','Admin\TourismVisaController@TourismInformasiVisaActive')->name('admin.t.iv.active');

        //Tourism Enchanting Labuan Bajo Destinasi
        Route::get('/elb/destinasi','Admin\TourismEnchantingDstController@TourismELBDestinasi')->name('admin.t.elb.destinasi');
        Route::get('/elb/destinasi/add','Admin\TourismEnchantingDstController@TourismELBDestinasiAdd')->name('admin.t.elb.destinasi.add');
        Route::get('/elb/destinasi/edit/{id}','Admin\TourismEnchantingDstController@TourismELBDestinasiEdit')->name('admin.t.elb.destinasi.edit');
        Route::post('/elb/destinasi/store','Admin\TourismEnchantingDstController@TourismELBDestinasiStore')->name('admin.t.elb.destinasi.store');
        Route::post('/elb/destinasi/update','Admin\TourismEnchantingDstController@TourismELBDestinasiUpdate')->name('admin.t.elb.destinasi.update');
        Route::post('/elb/destinasi/delete','Admin\TourismEnchantingDstController@TourismELBDestinasiDelete')->name('admin.t.elb.destinasi.delete');
        Route::post('/elb/destinasi/active','Admin\TourismEnchantingDstController@TourismELBDestinasiActive')->name('admin.t.elb.destinasi.active');
        Route::get('/elb/destinasi/datatable','Admin\TourismEnchantingDstController@TourismELBDestinasiDatatable')->name('admin.t.elb.destinasi.datatable');
        
        //Tourism Enchanting Labuan Bajo Event
        Route::get('/elb/event','Admin\TourismEnchantingEvtController@TourismELBEvent')->name('admin.t.elb.event');
        Route::get('/elb/event/add','Admin\TourismEnchantingEvtController@TourismELBEventAdd')->name('admin.t.elb.event.add');
        Route::get('/elb/event/edit/{id}','Admin\TourismEnchantingEvtController@TourismELBEventEdit')->name('admin.t.elb.event.edit');
        Route::post('/elb/event/store','Admin\TourismEnchantingEvtController@TourismELBEventStore')->name('admin.t.elb.event.store');
        Route::post('/elb/event/update','Admin\TourismEnchantingEvtController@TourismELBEventUpdate')->name('admin.t.elb.event.update');
        Route::post('/elb/event/delete','Admin\TourismEnchantingEvtController@TourismELBEventDelete')->name('admin.t.elb.event.delete');


        //Tourism Enchanting Labuan Bajo Art & Craft
        Route::get('/elb/art-craft','Admin\TourismEnchantingArtController@TourismELBArt')->name('admin.t.elb.art');
        Route::get('/elb/art-craft/add','Admin\TourismEnchantingArtController@TourismELBArtAdd')->name('admin.t.elb.art.add');
        Route::get('/elb/art-craft/edit/{id}','Admin\TourismEnchantingArtController@TourismELBArtEdit')->name('admin.t.elb.art.edit');
        Route::post('/elb/art-craft/store','Admin\TourismEnchantingArtController@TourismELBArtStore')->name('admin.t.elb.art.store');
        Route::post('/elb/art-craft/update','Admin\TourismEnchantingArtController@TourismELBArtUpdate')->name('admin.t.elb.art.update');
        Route::post('/elb/art-craft/delete','Admin\TourismEnchantingArtController@TourismELBArtDelete')->name('admin.t.elb.art.delete');
        Route::post('/elb/art-craft/homepage','Admin\TourismEnchantingArtController@TourismELBArtHomepage')->name('admin.t.elb.art.homepage');

        //Tourism Beyond Labuan Bajo Destinasi
        Route::get('/blb/destinasi','Admin\TourismBeyondDstController@TourismBLBDestinasi')->name('admin.t.blb.destinasi');
        Route::get('/blb/destinasi/add','Admin\TourismBeyondDstController@TourismBLBDestinasiAdd')->name('admin.t.blb.destinasi.add');
        Route::get('/blb/destinasi/edit/{id}','Admin\TourismBeyondDstController@TourismBLBDestinasiEdit')->name('admin.t.blb.destinasi.edit');
        Route::post('/blb/destinasi/store','Admin\TourismBeyondDstController@TourismBLBDestinasiStore')->name('admin.t.blb.destinasi.store');
        Route::post('/blb/destinasi/update','Admin\TourismBeyondDstController@TourismBLBDestinasiUpdate')->name('admin.t.blb.destinasi.update');
        Route::post('/blb/destinasi/delete','Admin\TourismBeyondDstController@TourismBLBDestinasiDelete')->name('admin.t.blb.destinasi.delete');
        Route::post('/blb/destinasi/active','Admin\TourismBeyondDstController@TourismBLBDestinasiHomepage')->name('admin.t.blb.destinasi.homepage');

        //Tourism Beyond Labuan Bajo Event
        Route::get('/blb/event','Admin\TourismBeyondEvtController@TourismBLBEvent')->name('admin.t.blb.event');
        Route::get('/blb/event/add','Admin\TourismBeyondEvtController@TourismBLBEventAdd')->name('admin.t.blb.event.add');
        Route::get('/blb/event/edit/{id}','Admin\TourismBeyondEvtController@TourismBLBEventEdit')->name('admin.t.blb.event.edit');
        Route::post('/blb/event/store','Admin\TourismBeyondEvtController@TourismBLBEventStore')->name('admin.t.blb.event.store');
        Route::post('/blb/event/update','Admin\TourismBeyondEvtController@TourismBLBEventUpdate')->name('admin.t.blb.event.update');
        Route::post('/blb/event/delete','Admin\TourismBeyondEvtController@TourismBLBEventDelete')->name('admin.t.blb.event.delete');


        //Tourism Beyond Labuan Bajo Art & Craft
        Route::get('/blb/art-craft','Admin\TourismBeyondArtController@TourismBLBArt')->name('admin.t.blb.art');
        Route::get('/blb/art-craft/add','Admin\TourismBeyondArtController@TourismBLBArtAdd')->name('admin.t.blb.art.add');
        Route::get('/blb/art-craft/edit/{id}','Admin\TourismBeyondArtController@TourismBLBArtEdit')->name('admin.t.blb.art.edit');
        Route::post('/blb/art-craft/store','Admin\TourismBeyondArtController@TourismBLBArtStore')->name('admin.t.blb.art.store');
        Route::post('/blb/art-craft/update','Admin\TourismBeyondArtController@TourismBLBArtUpdate')->name('admin.t.blb.art.update');
        Route::post('/blb/art-craft/delete','Admin\TourismBeyondArtController@TourismBLBArtDelete')->name('admin.t.blb.art.delete');
        Route::post('/blb/art-craft/homepage','Admin\TourismBeyondArtController@TourismBLBArtHomepage')->name('admin.t.blb.art.homepage');

        //Tourism Culinary
        Route::get('/culinary','Admin\TourismCulinaryController@TourismCulinary')->name('admin.t.culinary');
        Route::get('/culinary/add','Admin\TourismCulinaryController@TourismCulinaryAdd')->name('admin.t.culinary.add');
        Route::get('/culinary/edit/{id}','Admin\TourismCulinaryController@TourismCulinaryEdit')->name('admin.t.culinary.edit');
        Route::post('/culinary/store','Admin\TourismCulinaryController@TourismCulinaryStore')->name('admin.t.culinary.store');
        Route::post('/culinary/update','Admin\TourismCulinaryController@TourismCulinaryUpdate')->name('admin.t.culinary.update');
        Route::post('/culinary/delete','Admin\TourismCulinaryController@TourismCulinaryDelete')->name('admin.t.culinary.delete');
        Route::post('/culinary/homepage','Admin\TourismCulinaryController@TourismCulinaryHomepage')->name('admin.t.culinary.homepage');

        //Tourism Rumah Produksi
        Route::get('/rumah-produksi','Admin\TourismRumahProduksiController@index')->name('admin.t.rumah');
        Route::get('/rumah-produksi/add','Admin\TourismRumahProduksiController@TourismRumahProduksiAdd')->name('admin.t.rumah.add');
        Route::get('/rumah-produksi/edit/{id}','Admin\TourismRumahProduksiController@TourismRumahProduksiEdit')->name('admin.t.rumah.edit');
        Route::post('/rumah-produksi/delete','Admin\TourismRumahProduksiController@TourismRumahProduksiDelete')->name('admin.t.rumah.delete');
        Route::post('/rumah-produksi/store','Admin\TourismRumahProduksiController@TourismRumahProduksiStore')->name('admin.t.rumah.store');
        Route::post('/rumah-produksi/update','Admin\TourismRumahProduksiController@TourismRumahProduksiEditDB')->name('admin.t.rumah.update');


        //Tourism Resto
        Route::get('/resto','Admin\TourismRestoController@index')->name('admin.t.resto');
        Route::get('/resto/add','Admin\TourismRestoController@TourismRestoAdd')->name('admin.t.resto.add');
        Route::post('/resto/store','Admin\TourismRestoController@TourismRestoStore')->name('admin.t.resto.store');
        Route::post('/resto/update','Admin\TourismRestoController@TourismRestoEditDB')->name('admin.t.resto.update');
        Route::get('/resto/edit/{id}','Admin\TourismRestoController@TourismRestoEdit')->name('admin.t.resto.edit');
        Route::post('/resto/delete','Admin\TourismRestoController@TourismRestoDelete')->name('admin.t.resto.delete');


        //Plan Your Trip
        Route::get('/tour-package','Admin\TourismPackageController@TourismPlantTrip')->name('admin.t.pyt');
        Route::get('/tour-package/add','Admin\TourismPackageController@TourismPlantTripAdd')->name('admin.t.pyt.add');
        Route::get('/tour-package/edit/{id}','Admin\TourismPackageController@TourismPlantTripEdit')->name('admin.t.pyt.edit');
        Route::post('/tour-package/store','Admin\TourismPackageController@TourismPlantTripStore')->name('admin.t.pyt.store');
        Route::post('/tour-package/update','Admin\TourismPackageController@TourismPlantTripUpdate')->name('admin.t.pyt.update');
        Route::post('/tour-package/delete','Admin\TourismPackageController@TourismPlantTripDelete')->name('admin.t.pyt.delete');

        Route::get('/headline-news','Admin\AdminPageController@TourismHeadlineNews')->name('admin.t.hn');
    	Route::get('/headline-news/add','Admin\AdminPageController@TourismHeadlineNewsAdd')->name('admin.t.hn.add');
    	Route::get('/thematic-travel-plan','Admin\AdminPageController@TourismThematic')->name('admin.t.ttp');
    	Route::get('/thematic-travel-plan/add','Admin\AdminPageController@TourismThematicAdd')->name('admin.t.ttp.add');
    	Route::get('/coe','Admin\AdminPageController@TourismEvent')->name('admin.t.coe');
    	Route::get('/coe/add','Admin\AdminPageController@TourismEventAdd')->name('admin.t.coe.add');
    	Route::get('/things-to-do-see-buy','Admin\AdminPageController@TourismThings')->name('admin.t.things');
    	Route::get('/things-to-do-see-buy/add','Admin\AdminPageController@TourismThingsAdd')->name('admin.t.things.add');
    	Route::get('/destination-teaser','Admin\AdminPageController@TourismDestination')->name('admin.t.dt');
    	Route::get('/destination-teaser/add','Admin\AdminPageController@TourismdestinationAdd')->name('admin.t.dt.add');

    	Route::get('/echanting-labuan-bajo','Admin\AdminPageController@TourismELB')->name('admin.t.elb');
    	Route::get('/echanting-labuan-bajo/add','Admin\AdminPageController@TourismELBAdd')->name('admin.t.elb.add');

    	Route::get('/beyond-labuan-bajo','Admin\AdminPageController@TourismBLB')->name('admin.t.blb');
    	Route::get('/beyond-labuan-bajo/add','Admin\AdminPageController@TourismBLBAdd')->name('admin.t.blb.add');

    	Route::get('/UGC','Admin\AdminPageController@UGC')->name('admin.t.ugc');
        Route::post('/UGC/edit','Admin\AdminPageController@UGCEdit')->name('admin.t.ugc.edit');
       
        //new plan your trip
        Route::get('/plan-your-trip','Tourism\TourismPlanTripController@index')->name('admin.t.plan');
        Route::post('/plan-your-trip/post','Tourism\TourismPlanTripController@postPlan')->name('post.admin.t.plan');

        //new recomendation
        Route::get('/recomendation','Tourism\TourismRecomendationController@index')->name('admin.t.recomendation');
        Route::get('/recomendation/add','Tourism\TourismRecomendationController@add')->name('admin.t.recomendation.add');
        Route::post('/recomendation/post','Tourism\TourismRecomendationController@postRecomendation')->name('post.admin.t.recomendation');
        Route::get('/recomendation/{id}','Tourism\TourismRecomendationController@load')->name('admin.t.detail.recomendation');
        Route::post('/recomendation/update','Tourism\TourismRecomendationController@updateRecomendation')->name('update.admin.t.recomendation');
        Route::post('/recomendation/delete','Tourism\TourismRecomendationController@deleteRecomendation')->name('delete.admin.t.recomendation');
    });
	
	Route::prefix('/industri-investment')->group(function () {
    	Route::get('/slider','Admin\SliderController@InvestmentSlider')->name('admin.inv.slider');
		Route::get('/slider/add','Admin\SliderController@InvestmentSliderAdd')->name('admin.inv.slider.add');
        Route::post('/slider/store','Admin\SliderController@InvestmentSliderAddDB')->name('admin.inv.slider.store');
        Route::get('/slider/edit/{id}','Admin\SliderController@InvestmentSliderEdit')->name('admin.inv.slider.edit');
        Route::post('/slider/update','Admin\SliderController@InvestmentSliderEditDB')->name('admin.inv.slider.update');
        Route::post('/slider/delete','Admin\SliderController@InvestmentSliderDelete')->name('admin.inv.slider.delete');
        Route::post('/slider/active','Admin\SliderController@InvestmentSliderActive')->name('admin.inv.slider.active');

		Route::get('/investment-opportunity','Admin\AdminPageController@InvestmentHeadlineNews')->name('admin.inv.hn');
        Route::post('/investment-opportunity','Admin\AdminPageController@InvestmentHeadlineNewsUpdate')->name('admin.inv.hn.update');

        Route::get('/how-to-invest','Admin\AdminPageController@InvestmentHowToInvest')->name('admin.inv.how_to_invest');
        Route::post('/how-to-invest','Admin\AdminPageController@InvestmentHowToInvestUpdate')->name('admin.inv.how_to_invest.update');

        Route::get('/business-insiders','Admin\InvestmentBIController@BI')->name('admin.inv.business_insiders');
        Route::get('/business-insiders/add','Admin\InvestmentBIController@BIAdd')->name('admin.inv.business_insiders.add');
        Route::post('/business-insiders/store','Admin\InvestmentBIController@BIStore')->name('admin.inv.business_insiders.store');
        Route::get('/business-insiders/edit/{id}','Admin\InvestmentBIController@BIEdit')->name('admin.inv.business_insiders.edit');
        Route::post('/business-insiders/update','Admin\InvestmentBIController@BIUpdate')->name('admin.inv.business_insiders.update');
        Route::post('/business-insiders/delete','Admin\InvestmentBIController@BIDelete')->name('admin.inv.business_insiders.delete');

		Route::get('/achievement','Admin\AdminPageController@InvesmentAchievement')->name('admin.inv.achievement');
		Route::get('/achievement/add','Admin\AdminPageController@InvesmentAchievementAdd')->name('admin.inv.achievement.add');
		Route::get('/lahan','Admin\AdminPageController@InvesmentLahan')->name('admin.inv.lahan');
		Route::get('/lahan/add','Admin\AdminPageController@InvesmentLahanAdd')->name('admin.inv.lahan.add');
		Route::get('/kawasan-otorita','Admin\AdminPageController@InvesmentKawasanOtorita')->name('admin.inv.kawasan_otorita');
		Route::get('/kawasan-otorita/add','Admin\AdminPageController@InvesmentKawasanOtoritaAdd')->name('admin.inv.kawasan_otorita.add');
        
        Route::get('/komoditas-utama','Admin\AdminPageController@InvesmentKomoditasUtama')->name('admin.inv.komoditas_utama');
        Route::get('/komoditas-utama/add','Admin\AdminPageController@InvestmentKomoditasAdd')->name('admin.inv.komoditas_utama.add');
        Route::post('/komoditas-utama/update','Admin\AdminPageController@InvestmentKomoditasEditDB')->name('admin.inv.komoditas_utama.update');
        Route::get('/komoditas-utama/edit/{id}','Admin\AdminPageController@InvestmentKomoditasEdit')->name('admin.inv.komoditas_utama.edit');
        Route::post('/komoditas-utama/store','Admin\AdminPageController@InvestmentKomoditasStore')->name('admin.inv.komoditas_utama.store');
        Route::post('/komoditas-utama/delete','Admin\AdminPageController@InvestmentKomoditasDelete')->name('admin.inv.komoditas_utama.delete');
        
        Route::get('/ragam-sektor-industri','Admin\AdminPageController@InvesmentSektorIndustri')->name('admin.inv.sektor_industri');
        Route::get('/ragam-sektor-industri/add','Admin\AdminPageController@InvesmentSektorIndustriAdd')->name('admin.inv.sektor_industri.add');
        Route::post('/ragam-sektor-industri/update','Admin\AdminPageController@InvesmentSektorIndustriEditDB')->name('admin.inv.sektor_industri.update');
        Route::get('/ragam-sektor-industri/edit/{id}','Admin\AdminPageController@InvesmentSektorIndustriEdit')->name('admin.inv.sektor_industri.edit');
        Route::post('/ragam-sektor-industri/store','Admin\AdminPageController@InvesmentSektorIndustriStore')->name('admin.inv.sektor_industri.store');
        Route::post('/ragam-sektor-industri/delete','Admin\AdminPageController@InvesmentSektorIndustriDelete')->name('admin.inv.sektor_industri.delete');
        
        Route::get('/benefit-resiko','Admin\AdminPageController@InvesmentBenefitResiko')->name('admin.inv.benefit_resiko');
		Route::get('/benefit-resiko/add','Admin\AdminPageController@InvesmentBenefitResikoAdd')->name('admin.inv.benefit_resiko.add');
        Route::post('/benefit-resiko/update','Admin\AdminPageController@InvesmentBenefitResikoEditDB')->name('admin.inv.benefit_resiko.update');
        Route::get('/benefit-resiko/edit/{id}','Admin\AdminPageController@InvesmentBenefitResikoEdit')->name('admin.inv.benefit_resiko.edit');
        Route::post('/benefit-resiko/store','Admin\AdminPageController@InvesmentBenefitResikoStore')->name('admin.inv.benefit_resiko.store');
        Route::post('/benefit-resiko/delete','Admin\AdminPageController@InvesmentBenefitResikoDelete')->name('admin.inv.benefit_resiko.delete');

        Route::get('/infografis-kawasan-otorita','Admin\AdminPageController@InvesmentInfografisKawasanOtorita')->name('admin.inv.infografis_kawasan_otorita');
    	Route::get('/infografis-kawasan-otorita/add','Admin\AdminPageController@InvesmentInfografisKawasanOtoritaAdd')->name('admin.inv.infografis_kawasan_otorita.add');
		Route::get('/infografis-kawasan-flores','Admin\AdminPageController@InvesmentInfografisKawasanFlores')->name('admin.inv.infografis_kawasan_flores');
		Route::get('/infografis-kawasan-flores/add','Admin\AdminPageController@InvesmentInfografisKawasanFloresAdd')->name('admin.inv.infografis_kawasan_flores.add');
        
		Route::get('/kontak-invest','Admin\InvestmentBerinvestasiController@index')->name('admin.inv.kontak_invest');
        Route::post('/kontak-invest/delete','Admin\InvestmentBerinvestasiController@delete')->name('admin.inv.kontak_invest.delete');
        Route::get('/kontak-request','Admin\InvestmentPendanaanController@index')->name('admin.inv.kontak_request');
        Route::post('/kontak-request/delete','Admin\InvestmentPendanaanController@delete')->name('admin.inv.kontak_request.delete');
		
	});
	
	Route::prefix('/lbfta')->group(function () {
    	Route::get('/slider','Admin\SliderController@LbftaSlider')->name('admin.lbfta.slider');
		Route::get('/slider/add','Admin\SliderController@LbftaSliderAdd')->name('admin.lbfta.slider.add');
        Route::post('/slider/store','Admin\SliderController@LbftaSliderAddDB')->name('admin.lbfta.slider.store');
        Route::get('/slider/edit/{id}','Admin\SliderController@LbftaSliderEdit')->name('admin.lbfta.slider.edit');
        Route::post('/slider/update','Admin\SliderController@LbftaSliderEditDB')->name('admin.lbfta.slider.update');
        Route::post('/slider/delete','Admin\SliderController@LbftaSliderDelete')->name('admin.lbfta.slider.delete');
        Route::post('/slider/active','Admin\SliderController@LbftaSliderActive')->name('admin.lbfta.slider.active');
        
		Route::get('/headline-news','Admin\AdminPageController@LbftaHeadlineNews')->name('admin.lbfta.hn');
        Route::post('/headline-news','Admin\AdminPageController@LbftaHeadlineNewsUpdate')->name('admin.lbfta.hn.update');
        
		Route::get('/achievement','Admin\AdminPageController@LbftaAchievement')->name('admin.lbfta.achievement');
		Route::get('/achievement/add','Admin\AdminPageController@LbftaAchievementAdd')->name('admin.lbfta.achievement.add');
        
        // about
        Route::get('/about','Admin\AdminPageController@LbftaAbout')->name('admin.lbfta.about');
        Route::post('/about','Admin\AdminPageController@LbftaAboutUpdate')->name('admin.lbfta.about.update');

        //mission
        Route::get('/mission-vision','Admin\AdminPageController@LbftaMissionVision')->name('admin.lbfta.mission_vision');
        Route::post('/mission-vision','Admin\AdminPageController@LbftaMissionVisionUpdate')->name('admin.lbfta.mission_vision.update');

        //org
        Route::get('/organization-structure','Admin\AdminPageController@LbftaOrg')->name('admin.lbfta.org');
        Route::post('/organization-structure','Admin\AdminPageController@LbftaOrgUpdate')->name('admin.lbfta.org.update');

        //duties
        Route::get('/duties','Admin\AdminPageController@LbftaDuties')->name('admin.lbfta.duties');
        Route::post('/duties','Admin\AdminPageController@LbftaDutiesUpdate')->name('admin.lbfta.duties.update');

		Route::get('/program','Admin\ProfileProgramsController@LbftaProgram')->name('admin.lbfta.program');
        Route::get('/program/add','Admin\ProfileProgramsController@LbftaProgramAdd')->name('admin.lbfta.program.add');
        Route::post('/program/store','Admin\ProfileProgramsController@LbftaProgramStore')->name('admin.lbfta.program.store');
        Route::get('/program/edit/{id}','Admin\ProfileProgramsController@LbftaProgramEdit')->name('admin.lbfta.program.edit');
        Route::post('/program/update','Admin\ProfileProgramsController@LbftaProgramUpdate')->name('admin.lbfta.program.update');
        Route::post('/program/delete','Admin\ProfileProgramsController@LbftaProgramDelete')->name('admin.lbfta.program.delete');
        
		Route::get('/news-release','Admin\ProfileNewsController@LbftaNewsRelease')->name('admin.lbfta.news_release');
        Route::get('/news-release/add','Admin\ProfileNewsController@LbftaNewsReleaseAdd')->name('admin.lbfta.news_release.add');
        Route::post('/news-release/store','Admin\ProfileNewsController@LbftaNewsReleaseStore')->name('admin.lbfta.news_release.store');
        Route::get('/news-release/edit/{id}','Admin\ProfileNewsController@LbftaNewsReleaseEdit')->name('admin.lbfta.news_release.edit');
        Route::post('/news-release/update','Admin\ProfileNewsController@LbftaNewsReleaseUpdate')->name('admin.lbfta.news_release.update');
        Route::post('/news-release/delete','Admin\ProfileNewsController@LbftaNewsReleaseDelete')->name('admin.lbfta.news_release.delete');

        Route::get('/officials','Admin\ProfileOfficialsController@LbftaOfficials')->name('admin.lbfta.officials');
        Route::get('/officials/add','Admin\ProfileOfficialsController@LbftaOfficialsAdd')->name('admin.lbfta.officials.add');
        Route::post('/officials/store','Admin\ProfileOfficialsController@LbftaOfficialsStore')->name('admin.lbfta.officials.store');
        Route::get('/officials/edit/{id}','Admin\ProfileOfficialsController@LbftaOfficialsEdit')->name('admin.lbfta.officials.edit');
        Route::post('/officials/update','Admin\ProfileOfficialsController@LbftaOfficialsUpdate')->name('admin.lbfta.officials.update');
        Route::post('/officials/delete','Admin\ProfileOfficialsController@LbftaOfficialsDelete')->name('admin.lbfta.officials.delete');
        
		Route::get('/report','Admin\ProfileReportController@LbftaReport')->name('admin.lbfta.report');
        Route::get('/report/add','Admin\ProfileReportController@LbftaReportAdd')->name('admin.lbfta.report.add');
        Route::post('/report/store','Admin\ProfileReportController@LbftaReportStore')->name('admin.lbfta.report.store');
        Route::get('/report/edit/{id}','Admin\ProfileReportController@LbftaReportEdit')->name('admin.lbfta.report.edit');
        Route::post('/report/update','Admin\ProfileReportController@LbftaReportUpdate')->name('admin.lbfta.report.update');
        Route::post('/report/delete','Admin\ProfileReportController@LbftaReportDelete')->name('admin.lbfta.report.delete');

		Route::get('/faq','Admin\ProfileFAQController@LbftaFAQ')->name('admin.lbfta.faq');
        Route::get('/faq/add','Admin\ProfileFAQController@LbftaFAQAdd')->name('admin.lbfta.faq.add');
        Route::post('/faq/store','Admin\ProfileFAQController@LbftaFAQStore')->name('admin.lbfta.faq.store');
        Route::get('/faq/edit/{id}','Admin\ProfileFAQController@LbftaFAQEdit')->name('admin.lbfta.faq.edit');
        Route::post('/faq/update','Admin\ProfileFAQController@LbftaFAQUpdate')->name('admin.lbfta.faq.update');
        Route::post('/faq/delete','Admin\ProfileFAQController@LbftaFAQDelete')->name('admin.lbfta.faq.delete');
        
		Route::get('/kontak-inquiry','Admin\AdminPageController@LbftaKontakInquiry')->name('admin.lbfta.kontak_inquiry');
        Route::get('/kontak-inquiry/add','Admin\AdminPageController@LbftaKontakInquiryAdd')->name('admin.lbfta.kontak_inquiry.add');
        
        Route::get('/kontak-form','Admin\ProfileContactController@LbftaContact')->name('admin.lbfta.kontak_form');
        Route::post('/kontak-form/delete','Admin\ProfileContactController@LbftaContactDelete')->name('admin.lbfta.kontak_form.delete');
    });

    Route::prefix('/layout')->group(function () {
        Route::get('/footer','Admin\AdminPageController@Footer')->name('admin.layout.footer');
        Route::post('/footer/update','Admin\AdminPageController@FooterUpdate')->name('admin.layout.footer.update');
    });

    Route::post('/tinyMCEUpload', 'Admin\UploadController@upload');

});