<?php
	/**
	 * language pack
	 * @author bassam alessawi (sfhati.com [at] gmail [dot] com)
	 * @link www.sfhati.com
	 * @since 04/Dec/2011
	 *
	 */
	define('DATE_TIME_FORMAT', 'd/M/Y H:i:s');
	//Common
	//Menu




	define('MENU_SELECT', 'إختر');
	define('MENU_DOWNLOAD', 'تحميل');
	define('MENU_PREVIEW', 'معاينه');
	define('MENU_RENAME', 'تغيير الإسم');
	define('MENU_EDIT', 'تعديل');
	define('MENU_CUT', 'قص');
	define('MENU_COPY', 'نسخ');
	define('MENU_DELETE', 'حذف');
	define('MENU_PLAY', 'عرض');
	define('MENU_PASTE', 'لصق');

	//Label
		//Top Action
		define('LBL_ACTION_REFRESH', 'تهيئه');
		define('LBL_ACTION_DELETE', 'حذف');
		define('LBL_ACTION_CUT', 'قص');
		define('LBL_ACTION_COPY', 'نسخ');
		define('LBL_ACTION_PASTE', 'لصق');
		define('LBL_ACTION_CLOSE', 'إغلاق');
		define('LBL_ACTION_SELECT_ALL', 'تحديد الكل');
		//File Listing
	define('LBL_NAME', 'إسم');
	define('LBL_SIZE', 'حجم');
	define('LBL_MODIFIED', 'عدّل في');
		//File Information
	define('LBL_FILE_INFO', 'بيانات الملف :');
	define('LBL_FILE_NAME', 'الإسم :');
	define('LBL_FILE_CREATED', 'أنشئ :');
	define('LBL_FILE_MODIFIED', 'عدّل :');
	define('LBL_FILE_SIZE', 'حجم الملف : ');
	define('LBL_FILE_TYPE', 'نوع الملف :');
	define('LBL_FILE_WRITABLE', 'قابل للتعديل ؟');
	define('LBL_FILE_READABLE', 'قابل للقراءه ؟ ');
		//Folder Information
	define('LBL_FOLDER_INFO', 'معلومات المجلد');
	define('LBL_FOLDER_PATH', 'المجلد :');
	define('LBL_CURRENT_FOLDER_PATH', 'مسار المجلد الحالي :');
	define('LBL_FOLDER_CREATED', 'أنشئ :');
	define('LBL_FOLDER_MODIFIED', 'عدّل :');
	define('LBL_FOLDER_SUDDIR', 'مجلدات فرعيه :');
	define('LBL_FOLDER_FIELS', 'ملفات : ');
	define('LBL_FOLDER_WRITABLE', 'قابل للتعديل ؟');
	define('LBL_FOLDER_READABLE', 'قابل للقراءه ؟ ');
	define('LBL_FOLDER_ROOT', 'المجلد الأساسي');
		//Preview
	define('LBL_PREVIEW', 'معاينة');
	define('LBL_CLICK_PREVIEW', 'انقر هنا لمعاينته.');
	//Buttons
	define('LBL_BTN_SELECT', 'حدد');
	define('LBL_BTN_CANCEL', 'إلغاء');
	define('LBL_BTN_UPLOAD', 'تحميل');
	define('LBL_BTN_CREATE', 'انشئ');
	define('LBL_BTN_CLOSE', 'أغلق');
	define('LBL_BTN_NEW_FOLDER', 'مجلد جديد');
	define('LBL_BTN_NEW_FILE', 'ملف جديد');
	define('LBL_BTN_EDIT_IMAGE', 'تحرير');
	define('LBL_BTN_VIEW', 'حدد طريقة العرض');
	define('LBL_BTN_VIEW_TEXT', 'نص');
	define('LBL_BTN_VIEW_DETAILS', 'تفاصيل');
	define('LBL_BTN_VIEW_THUMBNAIL', 'مصغرات');
	define('LBL_BTN_VIEW_OPTIONS', 'عرض في :');
	//pagination
	define('PAGINATION_NEXT', 'التالي');
	define('PAGINATION_PREVIOUS', 'سابق');
	define('PAGINATION_LAST', 'آخر');
	define('PAGINATION_FIRST', 'الأول');
	define('PAGINATION_ITEMS_PER_PAGE', 'عرض %s عناصر في كل صفحة');
	define('PAGINATION_GO_PARENT', 'انتقل للمجلد الأصل');
	//System
	define('SYS_DISABLED', 'رفض إذن : تم تعطيل النظام.');

	//Cut
	define('ERR_NOT_DOC_SELECTED_FOR_CUT', 'لم تقم بتحديد أي ملف !');
	//Copy
	define('ERR_NOT_DOC_SELECTED_FOR_COPY', 'لم تقم بتحديد أي ملف !');
	//Paste
	define('ERR_NOT_DOC_SELECTED_FOR_PASTE', 'لم تقم بتحديد أي ملف !');
	define('WARNING_CUT_PASTE', ' هل انت متأكد من نقل المجلدات المختاره الى الملف الحالي؟');
	define('WARNING_COPY_PASTE', ' هل انت متأكد من نسخ الملفات المختاره الى المجلد الحالي؟');
	define('ERR_NOT_DEST_FOLDER_SPECIFIED', '.لم يتم تحديد الملف الهدف ');
	define('ERR_DEST_FOLDER_NOT_FOUND', '.لم يتم العثور على الملف الهدف');
	define('ERR_DEST_FOLDER_NOT_ALLOWED', ' غير مصرح لك نقل الملفات الى هذا المجلد');
	define('ERR_UNABLE_TO_MOVE_TO_SAME_DEST', '. المسار الهدف هو نفس المسار الاصلي (%s): فشل في نقل الملف ');
	define('ERR_UNABLE_TO_MOVE_NOT_FOUND', 'الملف الاصلي غير موجود  (%s):  فشل في نقل هذا الملف  (%s): ');
	define('ERR_UNABLE_TO_MOVE_NOT_ALLOWED', '. تم حجب الملف الاصلي (%s): فشل في نقل الملف ');

	define('ERR_NOT_FILES_PASTED', '.لم تقم بلصق اي ملفات ');

	//Search
	define('LBL_SEARCH', 'بحث');
	define('LBL_SEARCH_NAME', 'إسم الملف كامل - جزئي : ');
	define('LBL_SEARCH_FOLDER', 'بحث في : ');
	define('LBL_SEARCH_QUICK', 'بحث سريع');
	define('LBL_SEARCH_MTIME', 'وقت تعديل الملف : ');
	define('LBL_SEARCH_SIZE', 'حجم الملف : ');
	define('LBL_SEARCH_ADV_OPTIONS', 'خيارات متقدمه: ');
	define('LBL_SEARCH_FILE_TYPES', 'نوع الملف :');
	define('SEARCH_TYPE_EXE', 'برمجيات');

	define('SEARCH_TYPE_IMG', 'صور');
	define('SEARCH_TYPE_ARCHIVE', 'أرشيف');
	define('SEARCH_TYPE_HTML', 'HTML');
	define('SEARCH_TYPE_VIDEO', 'فيديو');
	define('SEARCH_TYPE_MOVIE', 'أفلام');
	define('SEARCH_TYPE_MUSIC', 'موسيقى');
	define('SEARCH_TYPE_FLASH', 'فلاش');
	define('SEARCH_TYPE_PPT', 'عرض شرائح');
	define('SEARCH_TYPE_DOC', 'وثيقه');
	define('SEARCH_TYPE_WORD', 'وورد');
	define('SEARCH_TYPE_PDF', 'بي دي أف');
	define('SEARCH_TYPE_EXCEL', 'إكسل');
	define('SEARCH_TYPE_TEXT', 'نص');
	define('SEARCH_TYPE_UNKNOWN', 'غير معروف');
	define('SEARCH_TYPE_XML', 'XML');
	define('SEARCH_ALL_FILE_TYPES', 'جميع انواع الملفات');
	define('LBL_SEARCH_RECURSIVELY', 'بحث  تكراري');
	define('LBL_RECURSIVELY_YES', 'نعم');
	define('LBL_RECURSIVELY_NO', 'لا');
	define('BTN_SEARCH', 'إبحث الآن');
	//thickbox
	define('THICKBOX_NEXT', 'Next&gt;');
	define('THICKBOX_PREVIOUS', '&lt;Prev');
	define('THICKBOX_CLOSE', 'أغلق');
	//Calendar
	define('CALENDAR_CLOSE', 'أغلق');
	define('CALENDAR_CLEAR', 'نضف');
	define('CALENDAR_PREVIOUS', '&lt;سابق');
	define('CALENDAR_NEXT', 'تالي&gt;');
	define('CALENDAR_CURRENT', 'اليوم');
	define('CALENDAR_MON', 'إثنين');
	define('CALENDAR_TUE', 'ثلاثاء');
	define('CALENDAR_WED', 'أربعاء');
	define('CALENDAR_THU', 'خميس');
	define('CALENDAR_FRI', 'جمعه');
	define('CALENDAR_SAT', 'سبت');
	define('CALENDAR_SUN', 'أحد');
	define('CALENDAR_JAN', 'يناير');
	define('CALENDAR_FEB', 'فبراير');
	define('CALENDAR_MAR', 'مارس ');
	define('CALENDAR_APR', 'ابريل ');
	define('CALENDAR_MAY', 'مايو');
	define('CALENDAR_JUN', 'يونيو ');
	define('CALENDAR_JUL', 'يوليو');
	define('CALENDAR_AUG', 'أغسطس ');
	define('CALENDAR_SEP', 'سبتمبر ');
	define('CALENDAR_OCT', 'أكتوبر ');
	define('CALENDAR_NOV', 'نوفمبر ');
	define('CALENDAR_DEC', 'ديسمبر');
	//ERROR MESSAGES
		//deletion
	define('ERR_NOT_FILE_SELECTED', 'الرجاء إختيار ملف :');
	define('ERR_NOT_DOC_SELECTED', 'لم تقم بتحديد أي ملف !');
	define('ERR_DELTED_FAILED', 'لا يمكن حذف الملف !');
	define('ERR_FOLDER_PATH_NOT_ALLOWED', '.مسار الملف غير مسموح');
		//class manager
	define('ERR_FOLDER_NOT_FOUND', ':غير قادر على ايجاد الملف المحدد ');
		//rename
	define('ERR_RENAME_FORMAT', '.  يجب ان يحتوي الاسم على احرف , ارقام, مسافات ,اندر سكور فقط ');
	define('ERR_RENAME_EXISTS', '.الرجاء اختيار اسم غير مكرر داخل الملف');
	define('ERR_RENAME_FILE_NOT_EXISTS', '.الملف او المجلد غير موجود');
	define('ERR_RENAME_FAILED', '. غير قادر على اعادة التسميه , الرجاء المحاولة مره اخره');
	define('ERR_RENAME_EMPTY', '. الرجاء اختيار اسم ');
	define('ERR_NO_CHANGES_MADE', '.لم تقم بعمل اي تغييرات');
	define('ERR_RENAME_FILE_TYPE_NOT_PERMITED', '.غير مسموح تغيير الملف الى هذا الامتداد');
		//folder creation
	define('ERR_FOLDER_FORMAT', ' يجب ان يحتوي الاسم على احرف , ارقام, مسافات ,اندر سكور فقط');
	define('ERR_FOLDER_EXISTS', '.الرجاء اختيار اسم غير مكرر داخل الملف');
	define('ERR_FOLDER_CREATION_FAILED', '.غير قادر على انشاء الملف , الرجاء المحاولة مره اخرى');
	define('ERR_FOLDER_NAME_EMPTY',' الرجاء اختيار اسم ');
	define('FOLDER_FORM_TITLE', ' نموذج مجلد جديد');
	define('FOLDER_LBL_TITLE', 'اسم المجلد:');
	define('FOLDER_LBL_CREATE', 'انشاء مجلد جديد');
	//New File
	define('NEW_FILE_FORM_TITLE', 'نموذج مجلد جديد');
	define('NEW_FILE_LBL_TITLE',' اسم الملف:');
	define('NEW_FILE_CREATE', 'انشاء ملف جديد');
		//file upload
	define('ERR_FILE_NAME_FORMAT', '.  يجب ان يحتوي الاسم على احرف , ارقام, مسافات ,اندر سكور فقط');
	define('ERR_FILE_NOT_UPLOADED', '.لم يتم اختيار اي ملف للرفع');
	define('ERR_FILE_TYPE_NOT_ALLOWED', '. هذا الملف غير مسموح للرفع');
	define('ERR_FILE_MOVE_FAILED', '. فشل في نقل الملف');
	define('ERR_FILE_NOT_AVAILABLE', '. الملف غير متوفر');
	define('ERROR_FILE_TOO_BID',' الملف كبير جدا. (max: %s)');
	define('FILE_FORM_TITLE', 'نموذج رفع الملفات');
	define('FILE_LABEL_SELECT', 'اختيار الملف');
	define('FILE_LBL_MORE', 'اضافة ملفات اضافيه');
	define('FILE_CANCEL_UPLOAD', 'الغاء ');
	define('FILE_LBL_UPLOAD', 'رفع');
	//file download
	define('ERR_DOWNLOAD_FILE_NOT_FOUND',' .لم يتم اختيار الملفات للتحميل');
	//Rename
	define('RENAME_FORM_TITLE', 'اعادة تسمية النموذج');
	define('RENAME_NEW_NAME', 'اسم جديد');
	define('RENAME_LBL_RENAME',' اعادة تسمية');

	//Tips
	define('TIP_FOLDER_GO_DOWN', '... اضغط لتدخل الى الملف');
	define('TIP_DOC_RENAME', '... ضغطتين للتعديل');
	define('TIP_FOLDER_GO_UP', '...اضغط للرجوع الى الخلف');
	define('TIP_SELECT_ALL', 'تحديد الكل');
	define('TIP_UNSELECT_ALL', 'الغاء التحديد');
	//WARNING
	define('WARNING_DELETE', '.هل انت متأكد من حذف الملفات المختاره');
	define('WARNING_IMAGE_EDIT', '.الرجاء اختيار الصوره للتعديل');
	define('WARNING_NOT_FILE_EDIT', '.الرجاء اختيار الملف للتعديل');
	define('WARING_WINDOW_CLOSE', 'هل انت متأكد من اغلاق هذه النافذه؟');
	//Preview
	define('PREVIEW_NOT_PREVIEW', '.لا يتوفر اي معاينة');
	define('PREVIEW_OPEN_FAILED', '.غير قادر على فتح الملف');
	define('PREVIEW_IMAGE_LOAD_FAILED', ' غير قادر على فتح الصوره');

	//Login
	define('LOGIN_PAGE_TITLE', 'Ajax File Manager Login Form');
	define('LOGIN_FORM_TITLE', ' نموذج تسجيل الدخول');
	define('LOGIN_USERNAME', ':اسم المستخدم');
	define('LOGIN_PASSWORD', ': كلمة المرور');
	define('LOGIN_FAILED', '.اسم المستخدم \كلمة المرور غير صحيحة');


	//88888888888   Below for Image Editor   888888888888888888888
		//Warning
		define('IMG_WARNING_NO_CHANGE_BEFORE_SAVE', '.لم تقم يأي تعديلات على الصوره');

		//General
		define('IMG_GEN_IMG_NOT_EXISTS', 'Image does not exist');
		define('IMG_WARNING_LOST_CHANAGES', ' سوف تخسر جميع التعديلات على الصور, هل تريد المتابعه؟');
		define('IMG_WARNING_REST', 'هل انت متأكد من اعادة التعيين , سوف تخسر جميع التعديلات؟');
		define('IMG_WARNING_EMPTY_RESET', 'لم تقم [اي تعديل على الصوره لهذه اللحظه');
		define('IMG_WARING_WIN_CLOSE', ' هل انت متأكد؟');
		define('IMG_WARNING_UNDO', 'هل انت متأكد من ارجاع الصورة للحاله السابقة؟ ');
		define('IMG_WARING_FLIP_H', 'هل تريد قلب الصورة أفقيا؟ ');
		define('IMG_WARING_FLIP_V', 'هل تريد قلب الصورة عاموديا؟');
		define('IMG_INFO', 'معلومات الصورة');

		//Mode
			define('IMG_MODE_RESIZE', ':تغيير الحجم');
			define('IMG_MODE_CROP', ':قص');
			define('IMG_MODE_ROTATE', ':لف');
			define('IMG_MODE_FLIP', 'قلب:');
		//Button

			define('IMG_BTN_ROTATE_LEFT', '90&deg;CCW');
			define('IMG_BTN_ROTATE_RIGHT', '90&deg;CW');
			define('IMG_BTN_FLIP_H', 'قلب بشكل افقي');
			define('IMG_BTN_FLIP_V', 'قلب بشكل عامودي');
			define('IMG_BTN_RESET', 'اعادة تعيين');
			define('IMG_BTN_UNDO', 'تراجع');
			define('IMG_BTN_SAVE', 'حفظ');
			define('IMG_BTN_CLOSE', 'اغلاق');
			define('IMG_BTN_SAVE_AS', 'حفظ بأسم');
			define('IMG_BTN_CANCEL',' الغاء');
		//Checkbox
			define('IMG_CHECKBOX_CONSTRAINT', 'قيود؟');
		//Label
			define('IMG_LBL_WIDTH', ':العرض');
			define('IMG_LBL_HEIGHT', ':الطول');
			define('IMG_LBL_X', 'X:');
			define('IMG_LBL_Y', 'Y:');
			define('IMG_LBL_RATIO', ':نسبة');
			define('IMG_LBL_ANGLE', ':مثلث');
			define('IMG_LBL_NEW_NAME', ':اسم جديد');
			define('IMG_LBL_SAVE_AS', ' نموذج حفظ بأسم');
			define('IMG_LBL_SAVE_TO', ':حفظ الى ');
			define('IMG_LBL_ROOT_FOLDER', 'المجلد الرئيسي');
		//Editor
		//Save as
		define('IMG_NEW_NAME_COMMENTS', '.الرجاء كتابة الاسم بدون الامتداد');
		define('IMG_SAVE_AS_ERR_NAME_INVALID',' يجب ان يحتوي الاسم على احرف , ارقام, مسافات ,اندر سكور فقط');
		define('IMG_SAVE_AS_NOT_FOLDER_SELECTED', '.لم يتم اختيار المجلد الهدف');
		define('IMG_SAVE_AS_FOLDER_NOT_FOUND', '.المجلد المطلوب غير متوفر');
		define('IMG_SAVE_AS_NEW_IMAGE_EXISTS', '.هذه الصورة موجوده مسبقا');

		//Save
		define('IMG_SAVE_EMPTY_PATH', '.المسار غير متوفر');
		define('IMG_SAVE_NOT_EXISTS', '.الصورة غير متوفرة');
		define('IMG_SAVE_PATH_DISALLOWED', '.غير مصرح لك الدخول الى هذا الملف');
		define('IMG_SAVE_UNKNOWN_MODE', 'Unexpected Image Operation Mode');
		define('IMG_SAVE_RESIZE_FAILED', '.فشل في اعادة تعيين حجم الصورة');
		define('IMG_SAVE_CROP_FAILED', '.فشل في قص الصورة');
		define('IMG_SAVE_FAILED', '.فشل في حفظ الصورة');
		define('IMG_SAVE_BACKUP_FAILED', '.غير قادر على استرجاع الصورة الاصلية');
		define('IMG_SAVE_ROTATE_FAILED', '.غير قادر على لف الصورة');
		define('IMG_SAVE_FLIP_FAILED', '.غير قادر على قلب الصورة');
		define('IMG_SAVE_SESSION_IMG_OPEN_FAILED', '.غير قادر على فتح الصورة ');
		define('IMG_SAVE_IMG_OPEN_FAILED', 'eغير قادر على فتح الصورة');


		//UNDO
		define('IMG_UNDO_NO_HISTORY_AVAIALBE', '.لا يوجد ذاكرة لاعادة التعيين ');
		define('IMG_UNDO_COPY_FAILED', '.غير قادر على اعادة تعيين الصورة');
		define('IMG_UNDO_DEL_FAILED', ' غير قادر على حذف الصورة');

	//88888888888   Above for Image Editor   888888888888888888888

	//88888888888   Session   888888888888888888888
		define('SESSION_PERSONAL_DIR_NOT_FOUND', 'Unable to find the dedicated folder which should have been created under session folder');
		define('SESSION_COUNTER_FILE_CREATE_FAILED', 'Unable to open the session counter file.');
		define('SESSION_COUNTER_FILE_WRITE_FAILED', 'Unable to write the session counter file.');
	//88888888888   Session   888888888888888888888

	//88888888888   Below for Text Editor   888888888888888888888
		define('TXT_FILE_NOT_FOUND', '.لم يتم العثور على الملف');
		define('TXT_EXT_NOT_SELECTED', 'الرجاء اختيار امتداد الملف');
		define('TXT_DEST_FOLDER_NOT_SELECTED', 'الرجاء اختيار الملف ');
		define('TXT_UNKNOWN_REQUEST', '.الطلب غير معروف');
		define('TXT_DISALLOWED_EXT', '.غير مصرح لك بالتعديل');
		define('TXT_FILE_EXIST', '.المف موجود مسبقا');
		define('TXT_FILE_NOT_EXIST', '.لم يتم العثور عليه');
		define('TXT_CREATE_FAILED', '.فشل في انشاء مجلد جديد');
		define('TXT_CONTENT_WRITE_FAILED', '.فشل في كتابة البيانات الى الملف');
		define('TXT_FILE_OPEN_FAILED', '.فشل في فتح الملف');
		define('TXT_CONTENT_UPDATE_FAILED', '.فشل في تعديل البيانات ');
		define('TXT_SAVE_AS_ERR_NAME_INVALID', 'يجب ان يحتوي الاسم على احرف , ارقام, مسافات ,اندر سكور فقط.');
	//88888888888   Above for Text Editor   888888888888888888888


?>