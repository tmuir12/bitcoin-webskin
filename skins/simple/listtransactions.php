<?php
/*
	Bitcoin Webskin - an open source PHP web interface to bitcoind
	Copyright (c) 2011 14STzHS8qjsDPtqpQgcnwWpTaSHadgEewS
*/
?><?php $this->template('header'); ?>

<p>Transactions: &nbsp; &nbsp; Account: <?php 
	switch( @$this->account ) {
		case '*': print 'ALL'; break;
		case '': print '<em>DEFAULT</em>'; break;
		default: print @$this->account; break;
	}
?> &nbsp; &nbsp; Count: <?php 
	@$this->count == 9999999
		? print 'ALL ' . @$this->info['transactions_count']
		: print 'Limit ' . @$this->count;
?> &nbsp; &nbsp; Start From: <?php
     @$this->from == 0
          ? print 'The newest transaction.'
          : print 'Skipping the newest ' .$this->from .' transactions.';
?>
</p>

<table>
 <tr>
  <td>Category</td>
  <td>Amount</td>
  <td>Status</td>
  <td><a href="?a=listaccounts">Account</a></td>  
  <td>Time</td>
  <td><a href="?a=listreceivedbyaddress">Address</a></td>
  <td>Transaction ID</td>
 </tr>
<?php
	if( !count(@$this->listtransactions) ) {
		print '<tr><td colspan="8">No Transactions Found</td></tr>';
	} else {
		foreach ($this->listtransactions AS $key => $value) {
			print '<tr>'
			. '<td>' .@$value['category'] . '</td>'
			. '<td class="amount">' .$value['amount'] . '</td>'
			. '<td class="conf">' . $value['status'] . '</td>'
			. '<td><a href="./?a=listtransactions&account=' 
				. urlencode($value['account']) . '">' . $value['account'] . '</a></td>'
			. '<td>' . $value['datetime'] . '</td>'
			. '<td class="address">' . (isset($value['address']) ? $value['address'] : '-') . '</td>'
			. '<td>' . (isset($value['txid'])
					? '<a href="?a=gettransaction&txid=' . urlencode($value['txid']) . '">'
						. $value['txid_short'] . '</a>'
					: '-')
			. '</td></tr>';
		} // end each transaction
	} // end if transactions
?>
</table>

<br /> &nbsp; 

<table>
 <tr>
  <td>Stats</td>
  <td>#</td>
  <td>Amount</td>
 </tr>
 <tr>
  <td>All</td>
  <td><?php print(@$this->info['transactions_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['transactions_amount']); ?> </td>
 </tr>
 <tr>
  <td>Receive</td>
  <td><?php print(@$this->info['receive_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['receive_amount']); ?> </td>
 </tr>
 <tr>
  <td>Send</td>
  <td><?php print(@$this->info['send_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['send_amount']); ?> </td>
 </tr> 
 <tr>
  <td>Move</td>
  <td><?php print(@$this->info['move_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['move_amount']); ?> </td>
 </tr> 
 <tr>
  <td>Orphan</td>
  <td><?php print(@$this->info['orphan_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['orphan_amount']); ?> </td>
 </tr>
 <tr>
  <td>Immature</td>
  <td><?php print(@$this->info['immature_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['immature_amount']); ?> </td>
 </tr>
 <tr>
  <td>Generate</td>
  <td><?php print(@$this->info['generate_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['generate_amount']); ?> </td>
 </tr> 
 <tr>
  <td>Unknown</td>
  <td><?php print(@$this->info['unknown_count']); ?> </td>
  <td class="amount"><?php print(@$this->info['unknown_amount']); ?> </td>
 </tr>  
</td></tr></table>

<?php $this->template('footer'); ?>
