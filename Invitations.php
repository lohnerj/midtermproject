<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitations</title>
</head>
<body>
    <h1>Invitations</h1>
    <?php
    $guestList = [
        ['id' => 1, 'name' => 'Guest 1', 'email' => 'email@example.com', 'phone' => '123-456-7890', 'rsvp' => 'Undecided'],
    ];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message = isset($_POST['invitationMessage']) ? $_POST['invitationMessage'] : '';
        $eventDetails = isset($_POST['eventDetails']) ? $_POST['eventDetails'] : '';
        $updatedGuestList = [];
        foreach ($guestList as $guest) {
            $id = $guest['id'];
            $updatedGuest = [
                'id' => $id,
                'name' => isset($_POST["name_$id"]) ? $_POST["name_$id"] : $guest['name'],
                'email' => isset($_POST["email_$id"]) ? $_POST["email_$id"] : $guest['email'],
                'phone' => isset($_POST["phone_$id"]) ? $_POST["phone_$id"] : $guest['phone'],
                'rsvp' => isset($_POST["rsvp_$id"]) ? $_POST["rsvp_$id"] : $guest['rsvp'],
            ];        
            $updatedGuestList[] = $updatedGuest;
        }
        $guestList = $updatedGuestList;
    }
    ?>
    <h2>Guest List</h2>
    <form id="guestListForm" action="" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Name:</th>
                    <th>Email:</th>
                    <th>Phone:</th>
                    <th>RSVP:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($guestList as $guest) {
                    $id = $guest['id'];
                    echo '<tr>';
                    echo '<td><input type="text" name="name_' . $id . '" value="' . $guest['name'] . '"></td>';
                    echo '<td><input type="email" name="email_' . $id . '" value="' . $guest['email'] . '"></td>';
                    echo '<td><input type="tel" name="phone_' . $id . '" value="' . $guest['phone'] . '"></td>';
                    echo '<td><select name="rsvp_' . $id . '">
                            <option value="Yes"' . ($guest['rsvp'] === 'Yes' ? ' selected' : '') . '>Yes</option>
                            <option value="No"' . ($guest['rsvp'] === 'No' ? ' selected' : '') . '>No</option>
                            <option value="Undecided"' . ($guest['rsvp'] === 'Undecided' ? ' selected' : '') . '>Undecided</option>
                        </select></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <button type="submit">Save Changes</button>
    </form>
    <button id="addGuestButton">Add Guest</button>
    <h2>Send Invitations</h2>
    <a href="https://www.google.com/gmail/about/" target="_blank"><button>Go To Gmail</button></a>
    <script>
        let nextGuestId = 2; // Initialize with 2 because you already have Guest 1
        document.getElementById("addGuestButton").addEventListener("click", function () {
            const tableBody = document.querySelector("tbody");
            const newRow = document.createElement("tr");
            const newId = nextGuestId++;
            newRow.innerHTML = `
                <td><input type="text" name="name_${newId}" value=""></td>
                <td><input type="email" name="email_${newId}" value=""></td>
                <td><input type="tel" name="phone_${newId}" value=""></td>
                <td><select name="rsvp_${newId}">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Undecided">Undecided</option>
                </select></td>`;
            tableBody.appendChild(newRow);
        });
    </script>
	<form action="PostEvent.php" method="post">
		<button type="submit" name="postEvent">Post Event</button>
	</form>
</body>
</html>
