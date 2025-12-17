<?php
session_start();
date_default_timezone_set('Asia/Dhaka');

// Manually set the cookie to 17 Dec 2025, 12:15 a.m. Bangladesh time
$fixed_time = strtotime("2025-12-17 00:15:00");
setcookie("last_modified", $fixed_time, time() + 3600, "/");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
<h2>Registration</h2>

<!-- Display session messages -->
<?php
if (isset($_SESSION['error_message'])) {
    echo '<div style="color: red;">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}
if (isset($_SESSION['success_message'])) {
    echo '<div style="color: green;">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}
?>

<!-- Display last modification time -->
<?php
if (isset($_COOKIE['last_modified'])) {
    $last_modified = (int)$_COOKIE['last_modified'];
    echo "<p><strong>Last Modified:</strong> " . date('d-m-Y h:i a', $last_modified) . "</p>";
} else {
    echo "<p>No modification history found.</p>";
}
?>

<!-- Registration Form -->
<form action="submit.php" method="post">
    <table>
        <tr>
            <!-- GENERAL INFORMATION -->
            <td>
                <fieldset>
                    <legend>General Information</legend>
                    <table>
                        <tr><td>First Name:</td><td><input type="text" name="fname" required></td></tr>
                        <tr><td>Last Name:</td><td><input type="text" name="lname" required></td></tr>
                        <tr><td>Gender:</td>
                            <td>
                                <input type="radio" name="gender" value="Male" required> Male
                                <input type="radio" name="gender" value="Female" required> Female
                            </td>
                        </tr>
                        <tr><td>Father's Name:</td><td><input type="text" name="father" required></td></tr>
                        <tr><td>Mother's Name:</td><td><input type="text" name="mother" required></td></tr>
                        <tr><td>Blood Group:</td>
                            <td>
                                <select name="blood" required>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td>Religion:</td>
                            <td>
                                <select name="religion" required>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christian">Christian</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>

            <!-- CONTACT INFORMATION -->
            <td>
                <fieldset>
                    <legend>Contact Information</legend>
                    <table>
                        <tr><td>Email:</td><td><input type="email" name="email" required></td></tr>
                        <tr><td>Phone/Mobile:</td><td><input type="text" name="phone" required></td></tr>
                        <tr><td>Website:</td><td><input type="text" name="website" required></td></tr>

                        <!-- ADDRESS -->
                        <tr><td>Address:</td><td>
                            <fieldset>
                                <legend>Present Address</legend><br>
                                <table>
                                    <tr><td>Country:</td>
                                        <td>
                                            <select name="country" required>
                                                <option value="Bangladesh">Bangladesh</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>City:</td>
                                        <td>
                                            <select name="city" required>
                                                <option value="Dhaka">Dhaka</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Street:</td><td><textarea name="street" rows="3" placeholder="road/street/city" required></textarea></td></tr>
                                    <tr><td>Post Code:</td><td><input type="text" name="postcode" placeholder="post Code" required></td></tr>
                                </table>
                            </fieldset>
                        </td></tr>
                    </table>
                </fieldset>
            </td>

            <!-- ACCOUNT INFORMATION -->
            <td>
                <fieldset>
                    <legend>Account Information</legend>
                    <table>
                        <tr><td>Username:</td><td><input type="text" name="username" required></td></tr>
                        <tr><td>Password:</td><td><input type="password" name="password" required></td></tr>
                        <tr><td>Confirm Password:</td><td><input type="password" name="confirm" required></td></tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>

    <br>
    <input type="submit" name="submit" value="Register">
    <input type="submit" name="submit" value="Save as Draft">
</form>
</body>
</html>
