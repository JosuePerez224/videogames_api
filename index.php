<?php include('header.php'); ?>
<?php require_once("Logic.php"); ?>
<?php $data = new Logic(); ?>
<?php $result = $data->getGame(); ?>
<!-- ^ Prevent more than one instance of the $conn -->
<header>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/control.png" alt="Logo" width="60" height="48" class="d-inline-block align-text-top">
                Videogames
            </a>
        </div>
    </nav>
</header>
<!-- Button trigger modal -->
<button type="button" class="btn-btn_primary" data-bs-toggle="modal" data-bs-target="#insertGameModal">
    <span class="btn-btn_span">Add a videogame</span>
</button>
<table id="myTable" class="display cell-border table_content">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Gender</th>
            <th>Company</th>
            <th>Year Publication</th>
            <th>Cost</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        try {
            // Bring all the data from db
            $result = $data->getGame();
            // Iterate in each result of the dictionary to print it
            foreach ($result as $videogame) { ?>
                <tr>
                    <td><?php echo $videogame["id"]; ?></td>
                    <td><?php echo $videogame["title"]; ?></td>
                    <td><?php echo $videogame["gender"]; ?></td>
                    <td><?php echo $videogame["company"]; ?></td>
                    <td><?php echo $videogame["release_date"]; ?></td>
                    <td><?php echo $videogame["total_cost"]; ?></td>
                    <!-- Buttons of delete and update -->
                    <td>
                        <button class="btn btn-dark updateButton" data-bs-toggle="modal" data-bs-target="#updateGameModal-<?php echo $videogame["id"]; ?>">
                            <i class="fa-solid fa-pen" style="color: #f2d15a;"></i>
                        </button>
                        <button class="btn btn-dark deleteButton" data-bs-toggle="modal" data-bs-target="#deleteGameModal-<?php echo $videogame["id"]; ?>">
                            <i class="fa-solid fa-trash" style="color: #ea1a1a;"></i>
                        </button>
                    </td>
                </tr>

                <!-- MODAL FOR EACH UPDATE BUTTON-->
                <div class="modal fade" id="updateGameModal-<?php echo $videogame["id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateGameModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="updateGameModalLabel">UPDATE</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <form action="Logic.php" method="post" class="add_form">
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input type="text" name="title" class="form-control" value="<?php echo $videogame["title"]; ?>" maxlength="50" placeholder="Name of the videogame" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" class="form-select" aria-label="Default select example" required>
                                                <option value="" disabled selected><?php echo $videogame["gender"]; ?></option>
                                                <option value="Action">Action</option>
                                                <option value="Rhythmic">Rhythmic</option>
                                                <option value="Aventure">Aventure</option>
                                                <option value="Arcade">Arcade</option>
                                                <option value="Racing">Racing</option>
                                                <option value="Sports">Sports</option>
                                                <option value="FPS">PFS</option>
                                                <option value="Strategy">Strategy</option>
                                                <option value="Platforms">Platforms</option>
                                                <option value="Roguelike">Roguelike</option>
                                                <option value="Sandbox">Sandbox</option>
                                                <option value="Rol">Rol</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <select required name="company" class="form-select" aria-label="Default select example">
                                                <option value="" disabled selected><?php echo $videogame["company"]; ?></option>
                                                <option value="2K Boston">2K Boston</option>
                                                <option value="343 Industries">343 Industries</option>
                                                <option value="Alexey Pajitnov">Alexey Pajitnov</option>
                                                <option value="Arkane Studios">Arkane Studios</option>
                                                <option value="Asobo Studio">Asobo Studio</option>
                                                <option value="Nintendo">Nintendo</option>
                                                <option value="Rockstar Games">Rockstar Games</option>
                                                <option value="Riot Games">Riot Games</option>
                                                <option value="Bandai Namco">Bandai Namco</option>
                                                <option value="Bethesda">Bethesda</option>
                                                <option value="BioWare">BioWare</option>
                                                <option value="Blizzard">Blizzard</option>
                                                <option value="Bluepoint Games">Bluepoint Games</option>
                                                <option value="Bungie">Bungie</option>
                                                <option value="Capcom">Capcom</option>
                                                <option value="Mojang">Mojang</option>
                                                <option value="Santamonica">Santamonica</option>
                                                <option value="Konami">Konami</option>
                                                <option value="miHoyo">miHoyo</option>
                                                <option value="Ubisoft">Ubisoft</option>
                                                <option value="FromSoftware">FromSoftware</option>
                                                <option value="Valve">Valve</option>
                                            </select>                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="release_date">Year of publication</label>
                                            <input type="date" name="release_date" class="form-control" value="<?php echo $videogame["release_date"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_cost">Total Cost</label>
                                            <input type="number" step="0.01" name="total_cost" class="form-control" value="<?php echo $videogame["total_cost"]; ?>" min="0" max="500" placeholder="Cost in dollars $" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="delete_id" value="<?php echo $videogame["id"]; ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <!-- MODAL FOR EACH DELETE BUTTON-->
                <div class="modal fade" id="deleteGameModal-<?php echo $videogame["id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteGameModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteGameModalLabel">Confirmation</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete the game <?php echo $videogame['title']; ?>?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="Logic.php" method="post" class="add_form">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="delete_id" value="<?php echo $videogame["id"]; ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php   }
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
        ?>
    </tbody>

</table>

<!-- MODAL FOR INSERT-->
<form action="Logic.php" method="POST" class="add_form">
    <div class="modal fade" id="insertGameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertGameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="insertGameModalLabel">Add a videogame</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="title" class="form-control" maxlength="50" placeholder="Name of the videogame" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-select" aria-label="Default select example" required>
                            <option value="" disabled selected>Select a gender</option>
                            <option value="Action">Action</option>
                            <option value="Rhythmic">Rhythmic</option>
                            <option value="Aventure">Aventure</option>
                            <option value="Arcade">Arcade</option>
                            <option value="Racing">Racing</option>
                            <option value="Sports">Sports</option>
                            <option value="FPS">PFS</option>
                            <option value="Strategy">Strategy</option>
                            <option value="Platforms">Platforms</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Rol">Rol</option>
                        </select>
                        <!-- <input type="text" name="gender" class="form-control" required> -->
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <select required name="company" class="form-select" aria-label="Default select example">
                            <option value="" disabled selected>Select a company</option>
                            <option value="2K Boston">2K Boston</option>
                            <option value="343 Industries">343 Industries</option>
                            <option value="Alexey Pajitnov">Alexey Pajitnov</option>
                            <option value="Arkane Studios">Arkane Studios</option>
                            <option value="Asobo Studio">Asobo Studio</option>
                            <option value="Nintendo">Nintendo</option>
                            <option value="Rockstar Games">Rockstar Games</option>
                            <option value="Riot Games">Riot Games</option>
                            <option value="Bandai Namco">Bandai Namco</option>
                            <option value="Bethesda">Bethesda</option>
                            <option value="BioWare">BioWare</option>
                            <option value="Blizzard">Blizzard</option>
                            <option value="Bluepoint Games">Bluepoint Games</option>
                            <option value="Bungie">Bungie</option>
                            <option value="Capcom">Capcom</option>
                            <option value="Mojang">Mojang</option>
                            <option value="Santamonica">Santamonica</option>
                            <option value="Konami">Konami</option>
                            <option value="miHoyo">miHoyo</option>
                            <option value="Ubisoft">Ubisoft</option>
                            <option value="FromSoftware">FromSoftware</option>
                            <option value="Valve">Valve</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label>
                        <input type="date" name="release_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="total_cost">Total Cost</label>
                        <input type="number" step="0.01" name="total_cost" class="form-control" min="0" max="500" placeholder="Cost in dollars $" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" value="insert">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>