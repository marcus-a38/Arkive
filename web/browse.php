<?php 
@session_start();

if (isset($_SESSION['username']) == false) {
    header("location:index.php?msg=Access Denied");
    exit;
}
?>

<!-- Needs cleaning up -->

<?php include 'header.php' ?>
    <div id="body-top" style="display: flex; flex-direction: column; align-items: center;">
        <h1 style="font-size: 72px;">Collection Browser</h1>
        <h2>Search our extensive collection using multiple search fields/terms.</h2>
        <p>You can use the following special characters:</p>
        <table class="table table-striped" style="width: auto;">
            <thead>
                <th scope="col">Character</th>
                <th scope="col">Behavior</th>
                <th scope="col">Example</th>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">^</th>
                    <td>Denotes the beginning of a string</td>
                    <td>"^music" matches "music" but not "record music"</td>
                </tr>
                <tr>
                    <th scope="row">$</th>
                    <td>Denotes the end of a string</td>
                    <td>"music$" matches "music" but not "music note"</td>
                </tr>
                <tr>
                    <th scope="row">*</th>
                    <td>Wildcard for zero or more characters</td>
                    <td>"musi*" matches "musi", "music", and "musically inclined"</td>
                </tr>
                <tr>
                    <th scope="row">_</th>
                    <td>Wildcard for a single character</td>
                    <td>"musi_" matches "musia" and "music"</td>
                </tr>
            </tbody>
        </table>
    </div>
    <form id="browse" action="searchAction.php" method="POST" style="display: flex; flex-direction: column; align-items: center; gap: 7.5px;">
        <div class="field" style="height: 30px; justify-content: center; padding: none;">
            <button type="button" class="field-button field-button-a" id="control-button">
            </button>
            <select class="field-select" id="field-select-0" style="height: 100%">
                <option value="" disabled selected>Choose a Field</option>
                    <option value="1">Artist Name</option>
                    <option value="2">Session Title</option>
                    <option value="3">Session Year</option>
                    <option value="4">Session Description</option>
                    <option value="5">Track Title</option>
                    <option value="5">Recording Location</option>
                    <option value="6">Genre</option>
            </select>
            <input type="text" name="field-input-0" id="field-input-0" class="field-input" style="height: 100%;" size="72"></input>
            <input type="checkbox" name="field-0-exact" id="field-exact-0" class="field-exact" value="true" ></input><small>&nbsp;Exact?</small>
        </div>
        <div id="browse-submit"><button class="button btn btn-outline-light border-3" type="submit" style="width: 200px; margin: 15px;">Search</button></div>
    </form>
    <script src="js/buildForm.js"></script>
<?php include 'footer.php' ?>