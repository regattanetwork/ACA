
<?php
/**
 * Created by PhpStorm.
 * User: Ken Taylor
 * Date: 2/9/2015
 * Time: 2:02 PM
 */

// Create the cards and suits
$cards = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A');
$suits = array('&clubs;','<span style="color:red;">&diams;</span>','<span style="color:red;">&hearts;</span>','&spades;');


// Create the deck by combining cards and suits
$deck = array();
foreach ($suits as $suit) {
    foreach ($cards as $card) {
        $deck[] = array ("card"=>$card, "suit"=>$suit);
    }
}
?>
<span>Deck before shuffling: <br /></span>"
<?php
print_r($deck);
?>
<p>
<span>Shuffled Deck <br /></span>
<?php
// Shuffle the deck
shuffle($deck);
print_r($deck);
?>
</p>
<p>
<span>Current Players: <br /></span>

<?php
// Here are the players
$players = array('Moe', 'Larry', 'Curly');
print_r($players);
// Get the count - doing it this way for now
$number_of_players = count($players);
?>
</p>
<p>
<span>Hands Dealt: <br /></span>
<?php
// Loop through the players
for($p = 0; $p < $number_of_players; $p++) {
    echo $players[$p];
    echo ':<br />';
    /* If 3 players loop through first 9 cards and assign
     *  1st card to player 1, second card to player 2 and so on
     */
    for($i = $p + 1; $i <= 9; $i += 3 ) {
        // This loop handles giving the card and showing card
        foreach($deck as $card_id => $deal){
            if ($card_id + 1 == $i) {
                // First three cards are up
                if ($card_id > 8) {
                    $card_value =
                        $deal['card'].' '.$deal['suit'];

                    echo $deal['card'].' '.$deal['suit'];
//
                    echo $deal['card'].' '.$deal['suit'];
                }
                else  {
                    echo $deal['card'].' '.$deal['suit'];
                    $card_value = $deal['card'].' '.$deal['suit'];
                }
                echo '<br /> ';
            }
        }
    }
};
?>
<p>
<span>Remaining Deck</span>
<?php
//                foreach($deck as $card_id => $deal){
//                    unset($card_id);
//                }
//echo 'Deck: '.$deck.'.';
