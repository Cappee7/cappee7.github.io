<div class="search-bar">
    <form action="searchform.php" method="POST">
        <input type="text" id="bar1" name="searchName" placeholder="Search for a game..." autocomplete="off" />

        <select id="genre" name="searchGenre">
            <option value="" disabled selected hidden>Genre</option>
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
            <option value="Fighting">Fighting</option>
            <option value="Platform">Platform</option>
            <option value="Puzzle">Puzzle</option>
            <option value="Role-Playing">RPG</option>
            <option value="Sports">Sports</option>
        </select>

        <select id="year" name="searchYear">
            <option value="" disabled selected hidden>Year</option>
            <?php
            $currentYear = date("Y");
            for ($i = 1984; $i <= $currentYear; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
        </select>

        <button type="submit" id="button" name="search">Search</button>

        <div class="result"></div>
    </form>
</div>