<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsettingsTable extends Migration
{
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->string('contact_success')->nullable();
            $table->string('contact_success_ar')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('map')->nullable();
            $table->string('w_phone')->nullable();
            $table->string('page_id')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_title_ar')->nullable();
            $table->text('contact_text')->nullable();
            $table->text('contact_text_ar')->nullable();
            $table->string('street')->nullable();
            $table->string('street_ar')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('side_title')->nullable();
            $table->text('side_text')->nullable();
            $table->string('slider')->nullable();
            $table->string('service')->nullable();
            $table->string('featured')->nullable();
            $table->string('small_banner')->nullable();
            $table->string('best')->nullable();
            $table->string('top_rated')->nullable();
            $table->string('large_banner')->nullable();
            $table->string('big')->nullable();
            $table->string('hot_sale')->nullable();
            $table->string('review_blog')->nullable();
            $table->string('best_seller_banner')->nullable();
            $table->string('best_seller_banner_link')->nullable();
            $table->string('big_save_banner')->nullable();
            $table->string('big_save_banner_link')->nullable();
            $table->string('best_seller_banner1')->nullable();
            $table->string('best_seller_banner_link1')->nullable();
            $table->string('big_save_banner1')->nullable();
            $table->string('big_save_banner_link1')->nullable();
            $table->string('partners')->nullable();
            $table->string('bottom_small')->nullable();
            $table->string('flash_deal')->nullable();
            $table->string('featured_category')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('generalsettings');
    }
}