<?php
// Formulaire d'édition d'un post
?>
<div class="row mb-4">
    <div class="col-md-12">
        <h1>Modifier le post</h1>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
    </div>
</div>

<form method="post" action="index.php?controller=post&action=edit&id=<?php echo is_array($post) ? $post['id'] : $post->id; ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" required value="<?php echo htmlspecialchars(is_array($post) ? $post['title'] : $post->title); ?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenu</label>
        <textarea class="form-control" id="content" name="content" rows="8" required><?php echo htmlspecialchars(is_array($post) ? $post['content'] : $post->content); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    <a href="index.php?controller=post&action=view&id=<?php echo is_array($post) ? $post['id'] : $post->id; ?>" class="btn btn-secondary ms-2">Annuler</a>
</form> 