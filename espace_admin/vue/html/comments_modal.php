<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vue/css/comments_modal.css">
</head>
<body>
<div id="commentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Commentaires</h2>
        <div class="comments-section">
            <?php if (!empty($comments)) { ?>
                <?php foreach ($comments as $comment) { ?>
                    <div class="comment">
                        <p><?php echo htmlspecialchars($comment['text']); ?></p>
                        <small><?php echo $comment['date_cmnt']; ?></small>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>Aucun commentaire pour cette tâche.</p>
            <?php } ?>
        </div>
        <form action="index.php?action=insert_comment" method="POST">
            <input type="hidden" name="task_id" id="task_id" value="<?php echo $task_id; ?>">
            <textarea name="comment" placeholder="Écrivez votre commentaire ici..." required></textarea>
            <button type="submit">Soumettre</button>
        </form>
    </div>
</div>

<script>
    // JavaScript pour fermer la modal
    const modal = document.getElementById("commentModal");
    const closeModal = document.querySelector(".close");
    closeModal.addEventListener("click", () => modal.style.display = "none");
    window.addEventListener("click", event => {
        if (event.target === modal) modal.style.display = "none";
    });
</script>
</body>
</html> -->
