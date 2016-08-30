<?php
/**
 * Proxy Design Pattern
 * 
 * Proxy design pattern provides a placeholder to another object to control it. 
 * The placeholder initiates the resource hungry object only when needed. 
 */
class Account 
{
	private $balance;
	private $type;

	function __construct($type, $balance)
	{
		$this->type = $type;
		$this->balance = $balance;
	}
}

/**
 * Account List is pretending to be a class that takes a lot of resources
 */
class AccountList 
{
	private $accounts = array();
	private $accountCount = 0;

	function __construct()
	{

	}

	public function getAccount($accountNumber) 
	{
		return $this->accounts[$accountNumber];
	}

	public function addAccount(Account $account)
	{
		$this->accounts[count($this->accounts) + 1] = $account;
		$this->accountCount++;
	}

	public function getAccountCount() {
		return $this->accountCount;
	}
}

/**
 * Proxy to AccountList
 * 
 * The proxy helps ease the resource load on AccountList. Only call the 
 * AccountList when necessary.
 */
class ProxyAccountList
{
	private $accountList = NULL;

	/**
	 * Create a AccountList object
	 */
	function makeAccountList() {
		$this->accountList = new AccountList;
	}

	/**
	 * Get the total number of accounts
	 */
	function getAccountCount() 
	{
		if(NULL == $this->accountList) {
			$this->makeAccountList();
		}
		return $this->accountList->getAccountCount();
	}

	/**
	 * Add account
	 */
	function addAccount(Account $account)
	{
		if(NULL == $this->accountList)
		{
			$this->makeAccountList();
		}
		return $this->accountList->addAccount($account);
	}
}

$proxyAccountList = new ProxyAccountList();
echo $proxyAccountList->getAccountCount();