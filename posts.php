<?php
// Page d'administration - Gestion des posts
?>

<div class="row mb-4">
    <div class="col-md-12">
        <h1>Gestion des posts</h1>
        <p class="lead">Gérez les publications de la plateforme Thumbflow.</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-file-alt me-1"></i> Liste des posts
    </div>
    <div class="card-body">
        <?php if (empty($posts)): ?>
            <div class="alert alert-info">
                Aucun post publié.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Date de publication</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?php echo $post['id']; ?></td>
                                <td><?php echo htmlspecialchars($post['title']); ?></td>
                                <td><?php echo htmlspecialchars($post['author']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($post['created_at'])); ?></td>
                                <td>
                                    <a href="index.php?controller=post&action=view&id=<?php echo $post['id']; ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?controller=post&action=edit&id=<?php echo $post['id']; ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller=post&action=delete&id=<?php echo $post['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="index.php?controller=admin" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour au tableau de bord
        </a>
        <a href="index.php?controller=post&action=create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Créer un nouveau post
        </a>
    </div>
</div>
