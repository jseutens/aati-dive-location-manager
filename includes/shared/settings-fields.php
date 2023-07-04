<?php
function aatidlm_get_contact_data() {
    // contact data
	$arr_address=[__('Address', AATILPI_TEXTDOMAIN),'aatidlm_address','textarea',1,'yes',__('Fill in the address of the location', AATILPI_TEXTDOMAIN)];
	$arr_gps_coords=[__('Gps Coordinates', AATILPI_TEXTDOMAIN),'aatidlm_gps_coords','text',2,'yes',__('GPS coordinates seperated with a comma', AATILPI_TEXTDOMAIN)];
	$arr_phone=[__('Phone', AATILPI_TEXTDOMAIN),'aatidlm_phone','text',3,'yes',__('Your landline number', AATILPI_TEXTDOMAIN)];
	$arr_cellphone=[__('Cellphone', AATILPI_TEXTDOMAIN),'aatidlm_cellphone','text',4,'yes',__('Your cellphone number', AATILPI_TEXTDOMAIN)];
	$arr_fax=[__('Fax', AATILPI_TEXTDOMAIN),'aatidlm_fax','text',5,'yes',__('Your fax number', AATILPI_TEXTDOMAIN)];
	$arr_whatsapp=[__('Whatsapp', AATILPI_TEXTDOMAIN),'aatidlm_whatsapp','text',6,'yes',__('This is the number that will be used to send the message. It must be a full phone number in international format.<br>Omit any zeroes, brackets, or dashes when adding the phone number in international format.<br>Examples:<br>Use: 1XXXXXXXXXX<br>Don\'t use: +001-(XXX)XXXXXXX', AATILPI_TEXTDOMAIN)];
	$arr_e_mail=[__('E-mail', AATILPI_TEXTDOMAIN),'aatidlm_e_mail','text',7,'yes',__('Your e-mail address', AATILPI_TEXTDOMAIN)];
	$arr_ordering_link=[__('Ordering link', AATILPI_TEXTDOMAIN),'aatidlm_ordering_link','text',8,'yes',__('If you offer online ordering, enter the URL of your order page here (can be on this site or external) and a link to it will display in your contact card.', AATILPI_TEXTDOMAIN)];
	$arr_skype=[__('Skype', AATILPI_TEXTDOMAIN),'aatidlm_skype','text',9,'no',__('Your Skype account', AATILPI_TEXTDOMAIN)];
	$arr_viber=[__('Viber', AATILPI_TEXTDOMAIN),'aatidlm_viber','text',10,'no',__('Your Viber account', AATILPI_TEXTDOMAIN)];
	$arr_telegram=[__('Telegram', AATILPI_TEXTDOMAIN),'aatidlm_telegram','text',11,'no',__('Your Telegram account', AATILPI_TEXTDOMAIN)];
	$arr_wechat=[__('WeChat', AATILPI_TEXTDOMAIN),'aatidlm_wechat','text',12,'no',__('Your WeChat account', AATILPI_TEXTDOMAIN)];
	$arr_line=[__('Line', AATILPI_TEXTDOMAIN),'aatidlm_line','text',13,'no',__('Your Line account', AATILPI_TEXTDOMAIN)];
	$arr_kakao=[__('KakaoTalk', AATILPI_TEXTDOMAIN),'aatidlm_kakao','text',14,'no',__('Your KakaoTalk account', AATILPI_TEXTDOMAIN)];
	$arr_weibo=[__('Weibo', AATILPI_TEXTDOMAIN),'aatidlm_weibo','text',15,'no',__('Your Weibo account', AATILPI_TEXTDOMAIN)];
    return [$arr_address, $arr_gps_coords, $arr_phone, $arr_cellphone, $arr_fax, $arr_whatsapp, $arr_e_mail, $arr_ordering_link, $arr_skype, $arr_viber, $arr_telegram, $arr_wechat, $arr_line, $arr_kakao, $arr_weibo];
}

function aatidlm_get_legal_info() {
    // legal information
	$arr_VAT=[__('VAT', AATILPI_TEXTDOMAIN),'aatidlm_VAT','text',20,'yes',__('This is your VAT number', AATILPI_TEXTDOMAIN)];
	$arr_company_id=[__('Company ID', AATILPI_TEXTDOMAIN),'aatidlm_company_id','text',21,'yes',__('This is the company ID number with the goverment , can be the same as VAT like in Belgium', AATILPI_TEXTDOMAIN)];
	$arr_prof_id=[__('Professional ID', AATILPI_TEXTDOMAIN),'aatidlm_prof_id','text',22,'yes',__('If you are part of a professional organisation you can add these details here', AATILPI_TEXTDOMAIN)];
	$arr_bank_account=[__('Bank account', AATILPI_TEXTDOMAIN),'aatidlm_bank_account','text',23,'yes',__('This is the company bank account number', AATILPI_TEXTDOMAIN)];
	$arr_bank_bicswift=[__('BIC/SWIFT code', AATILPI_TEXTDOMAIN),'aatidlm_bank_bicswift','text',24,'yes',__('The BIC/SWIFT code of the bank', AATILPI_TEXTDOMAIN)];
    return [$arr_VAT, $arr_company_id, $arr_prof_id, $arr_bank_account, $arr_bank_bicswift];
}

function aatidlm_get_social_media() {
    // social media
	$arr_facebook=[__('Facebook', AATILPI_TEXTDOMAIN),'aatidlm_facebook','text',40,'no',__('Your Facebook page', AATILPI_TEXTDOMAIN)];
	$arr_twitter=[__('Twitter', AATILPI_TEXTDOMAIN),'aatidlm_twitter','text',41,'no',__('Your Twitter handle', AATILPI_TEXTDOMAIN)];
	$arr_instagram=[__('Instagram', AATILPI_TEXTDOMAIN),'aatidlm_instagram','text',42,'no',__('Your Instagram account', AATILPI_TEXTDOMAIN)];
	$arr_youtube=[__('YouTube', AATILPI_TEXTDOMAIN),'aatidlm_youtube','text',43,'no',__('Your YouTube page', AATILPI_TEXTDOMAIN)];
	$arr_reddit=[__('Reddit', AATILPI_TEXTDOMAIN),'aatidlm_reddit','text',44,'no',__('Your Reddit page', AATILPI_TEXTDOMAIN)];
	$arr_discord=[__('Discord', AATILPI_TEXTDOMAIN),'aatidlm_discord','text',45,'no',__('Your Discord page', AATILPI_TEXTDOMAIN)];
	$arr_twitch=[__('Twitch', AATILPI_TEXTDOMAIN),'aatidlm_twitch','text',46,'no',__('Your Twich page', AATILPI_TEXTDOMAIN)];
	$arr_snapchat=[__('Snapchat', AATILPI_TEXTDOMAIN),'aatidlm_snapchat','text',47,'no',__('Your Snapchat account', AATILPI_TEXTDOMAIN)];
	$arr_pinterest=[__('Pinterest', AATILPI_TEXTDOMAIN),'aatidlm_pinterest','text',48,'no',__('Your Pinterest page', AATILPI_TEXTDOMAIN)];
	$arr_linkedin=[__('LinkedIn', AATILPI_TEXTDOMAIN),'aatidlm_linkedin','text',49,'no',__('Your LinkedIn page', AATILPI_TEXTDOMAIN)];
	$arr_tumblr=[__('Tumblr', AATILPI_TEXTDOMAIN),'aatidlm_tumblr','text',50,'no',__('Your Tumblr page', AATILPI_TEXTDOMAIN)];
	$arr_flickr=[__('Flickr', AATILPI_TEXTDOMAIN),'aatidlm_flickr','text',51,'no',__('Your Flickr page', AATILPI_TEXTDOMAIN)];
	$arr_github=[__('GitHub', AATILPI_TEXTDOMAIN),'aatidlm_github','text',52,'no',__('Your GitHub page', AATILPI_TEXTDOMAIN)];
	$arr_bitbucket=[__('Bitbucket', AATILPI_TEXTDOMAIN),'aatidlm_bitbucket','text',53,'no',__('Your Bitbucket page', AATILPI_TEXTDOMAIN)];
	$arr_stackoverflow=[__('Stack Overflow', AATILPI_TEXTDOMAIN),'aatidlm_stackoverflow','text',54,'no',__('Your Stack Overflow page', AATILPI_TEXTDOMAIN)];
	$arr_medium=[__('Medium', AATILPI_TEXTDOMAIN),'aatidlm_medium','text',55,'no',__('Your Medium page', AATILPI_TEXTDOMAIN)];
	$arr_quora=[__('Quora', AATILPI_TEXTDOMAIN),'aatidlm_quora','text',56,'no',__('Your Quora page', AATILPI_TEXTDOMAIN)];
	$arr_vimeo=[__('Vimeo', AATILPI_TEXTDOMAIN),'aatidlm_vimeo','text',57,'no',__('Your Vimeo page', AATILPI_TEXTDOMAIN)];
	$arr_dribbble=[__('Dribbble', AATILPI_TEXTDOMAIN),'aatidlm_dribbble','text',58,'no',__('Your Dribbble page', AATILPI_TEXTDOMAIN)];
	$arr_behance=[__('Behance', AATILPI_TEXTDOMAIN),'aatidlm_behance','text',59,'no',__('Your Behance page', AATILPI_TEXTDOMAIN)];
	$arr_deviantart=[__('DeviantArt', AATILPI_TEXTDOMAIN),'aatidlm_deviantart','text',60,'no',__('Your DeviantArt page', AATILPI_TEXTDOMAIN)];
	$arr_foursquare=[__('Foursquare', AATILPI_TEXTDOMAIN),'aatidlm_foursquare','text',61,'no',__('Your Foursquare page', AATILPI_TEXTDOMAIN)];
    return [$arr_facebook, $arr_twitter, $arr_instagram, $arr_youtube, $arr_reddit, $arr_discord, $arr_twitch, $arr_snapchat, $arr_pinterest, $arr_linkedin, $arr_tumblr, $arr_flickr, $arr_github, $arr_bitbucket, $arr_stackoverflow, $arr_medium, $arr_quora, $arr_vimeo, $arr_dribbble, $arr_behance, $arr_deviantart, $arr_foursquare];
}

// Define additional arrays
define('AATILPI_CONTACT_DATA', aatidlm_get_contact_data());
define('AATILPI_LEGAL_INFO', aatidlm_get_legal_info());
define('AATILPI_SOCIAL_MEDIA', aatidlm_get_social_media());

function aatidlm_get_fields_array() {
    $contact_data = AATILPI_CONTACT_DATA;
    $legal_info = AATILPI_LEGAL_INFO;
    $social_media = AATILPI_SOCIAL_MEDIA;

    return array_merge($contact_data, $legal_info, $social_media);
}

define('AATILPI_FIELDS_ARRAY', aatidlm_get_fields_array());
