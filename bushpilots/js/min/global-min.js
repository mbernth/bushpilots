/**
 * This script adds the jquery effects to the bushpilots Theme.
 *
 * @package Mono\JS
 * @author mono voce aps
 * @license GNU-General-Public-License-v3.0
 */
!function($){$(document).ready((function(){$("body").addClass("js")})),$(document).ready((function(){$(".trigger-overlay").click((function(){$(".overlay-contentpush").addClass("overlay-open")}))})),$(document).ready((function(){$(".overlay-close").click((function(){$(".overlay-contentpush").removeClass("overlay-open")}))})),$(document).scrollTop()>0&&$(".site-header").addClass("dark"),$(document).on("scroll",(function(){$(document).scrollTop()>0?$(".site-header").addClass("dark"):$(".site-header").removeClass("dark")})),$(window).scroll((function(){}))}(jQuery);