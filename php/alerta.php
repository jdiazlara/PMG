<div id="alertParent" class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
              <strong>
                <?php echo $_SESSION['mensaje']; ?>
              </strong>
              <button type="button" onClick="this.parentElement.remove()" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <script>
                  setTimeout(() => document.getElementById("alertParent").remove(), 5000)
              </script>
            </div>