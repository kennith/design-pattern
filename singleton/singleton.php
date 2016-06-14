<?php
// Singleton should not be think of a replacement to global variable.

class Book {
	private static $isCheckout = FALSE;
	private static $status = NULL;



	static function checkout() {
		if(self::$isCheckout == FALSE) {
			if(self::$status == NULL) {
				self::$status = new Book();
			}
			self::$isCheckout = TRUE;
			var_dump("Checkout succssfully.");
			return self::$status;
		} else {
			var_dump("Checkout failed.");
			return NULL;
		}
	}

	static function checkin() {
		var_dump("Returning...");
		self::$isCheckout = FALSE;
	}
}

$borrower = new Book();
$borrower2 = new Book();

var_dump($borrower->checkout());
var_dump($borrower2->checkout());

$borrower->checkin();
var_dump($borrower2->checkout());