<link href="main.css" rel="stylesheet" type="text/css" />
<?php
include("api.php");
$xivfname = $_GET['xivfname'];
$xivlname = $_GET['xivlname'];
$xivserver = $_GET['xivserver'];

if (!empty($xivfname) AND !empty($xivlname) AND !empty($xivserver)) {


// Initialize a LodestoneAPI Obkect

$API = new LodestoneAPI();



// Parse the character:
if ($Character = $API->get(array("name" => "".$xivfname." ".$xivlname."", "server" => "".$xivserver.""))) {
	$Character = $API->get(array("name" => "".$xivfname." ".$xivlname."", "server" => "".$xivserver.""));
}
else {
	echo 'Could not retreive character.';	
}


// character values from api
if (!empty($Character->getID())) {
echo '<label>ID:</label> ';
echo $Character->getID();
echo "<br />";
}

if (!empty($Character->getLodestone())) {
echo '<label>Lodestone URL:</label> ';
echo "<a href='".$Character->getLodestone()."' target='_blank'>".$Character->getLodestone()."</a>";// the url of their lodestone profile
echo "<br />";
}

if (!empty($Character->getName())) {
echo '<label>Character Name:</label> ';
echo $Character->getName();
echo "<br />";
}

if (!empty($Character->getServer())) {
echo '<label>Server:</label> ';
echo $Character->getServer();
echo "<br />";
}

if (!empty($Character->getNameClean())) {
echo '<label>Clean Name:</label> ';
echo $Character->getNameClean(); // twitter like name, eg "Premium Vir'tue" --> "premiumvirtue"
echo "<br />";
}

echo '<label>Avatar:</label> ';
echo "<br />";
echo '<img src="'. $Character->getAvatar(96) .'" />'; // size of avatars: 50, 64, 96
echo "<br />";

if (!empty($Character->getPortrait())) {
echo '<label>Portrait:</label> ';
echo "<br />";
echo '<img src="'. $Character->getPortrait() .'" />';
echo "<br />";
}

if (!empty($Character->getRace())) {
echo '<label>Race:</label> ';
echo $Character->getRace();
echo "<br />";
}

if (!empty($Character->getClan())) {
echo '<label>Clan:</label> ';
echo $Character->getClan();
echo "<br />";
}

if (!empty($Character->getLegacy())) {
echo '<label>Legacy:</label> ';
echo $Character->getLegacy();// This is "Sixth Astral Era" status
echo "<br />";
}

if (!empty($Character->getNameday())) {
echo '<label>Nameday:</label> ';
echo $Character->getNameday();
echo "<br />";
}

if (!empty($Character->getGuardian())) {
echo '<label>Guardian:</label> ';
echo $Character->getGuardian();
echo "<br />";
}

if (!empty($Character->getCompanyName())) {
echo '<label>Company Name:</label> ';
echo $Character->getCompanyName();
echo "<br />";
}

if (!empty($Character->getCompanyRank())) {
echo '<label>Company Rank:</label> ';
echo $Character->getCompanyRank();
echo "<br />";
}

if (!empty($Character->getFreeCompany())) {
echo '<label>Free Company:</label> ';
foreach ($Character->getFreeCompany() as $key => $value) {
	if ($key == 'name') {
		$name = $value;
	}
	if ($key == 'id') {
		
		echo "<a href='http://na.finalfantasyxiv.com/lodestone/freecompany/".$value."' target='_blank'>".$name."</a>";
	}
}
echo "<br />";
}

if (!empty($Character->getCity())) {
echo '<label>City:</label> ';
echo $Character->getCity();
echo "<br />";
}

if (!empty($Character->getBiography())) {
echo '<label>Biography:</label> ';
echo $Character->getBiography();
echo "<br />";
}

/* NOT IN USE
if (!empty($Character->getStat())) {
echo '<label>Attributes:</label> ';
echo $Character->getStat('offense', 'critical hit rate');
echo "<br />";
}
*/

if (!empty($Character->getGear())) {
echo '<label>Gear:</label> ';
echo "<br />";
foreach ($Character->getGear() as $gear) {
		foreach ($gear as $equippeditems) {
			foreach ($equippeditems as $key => $equippeditem) {
				if (!is_numeric($key)) {
				echo "<div id='floatleft'>";
				echo "".$equippeditem['name']." ";
				echo "<br />";
				echo '<img src="'. $equippeditem['icon'] .'" />';
				echo "</div>";
				}
			}
		}
	}
}
echo "<div id='clear'> </div>";

/* NOT IN USE
if (!empty($Character->getEquipped(slots))) {
echo '<label>Equipped:</label> ';
if (!empty($Character->getEquipped())) {
echo $Character->getEquipped(numbers); // List by 'numbers', or list by 'slots'
echo "<br />";
}
}
*/

if (!empty($Character->getSlot())) {
echo '<label>Specific Slot:</label> ';
echo $Character->getSlot(); // (List below)
echo "<br />";
}

if (!empty($Character->getActiveClass())) {
echo '<label>Active Class:</label> ';
echo $Character->getActiveClass();
echo "<br />";
}

if (!empty($Character->getActiveJob())) {
echo '<label>Active Job:</label> ';
echo $Character->getActiveJob();
echo "<br />";
}

if (!empty($Character->getActiveLevel())) {
echo '<label>Active Level:</label> ';
echo $Character->getActiveLevel();
echo "<br />";
}

if (!empty($Character->getMinions())) {
echo '<label>Minions:</label> ';
echo "<br />";
foreach ($Character->getMinions() as $value) {
		echo "<div id='floatleft'>";
		echo "".$value['name']." ";
		echo "<br />";
		echo '<img src="'. $value['icon'] .'" />';
		echo "</div>";
}
}

/* NOT IN USE 
if (!empty($Character->getClassJob())) {
echo '<label>Class and Job:</label> ';
echo $Character->getClassJob(getActiveClass()); // Get level/exp info of a class
echo "<br />";
}
*/

if (!empty($Character->getErrors())) {
echo '<label>Errors:</label> ';
echo $Character->getErrors(); // List of errors found during validation
echo "<br />";
}

} else {
	echo 'Sorry an error occurred.';
}

?>