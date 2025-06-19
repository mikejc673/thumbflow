<?php
// Page d'administration - Gestion des utilisateurs
?>

<div class="row mb-4">
    <div class="col-md-12">
        <h1>Gestion des utilisateurs</h1>
        <p class="lead">Gérez les utilisateurs de la plateforme Thumbflow.</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-users me-1"></i> Liste des utilisateurs
    </div>
    <div class="card-body">
        <?php if (empty($users)): ?>
            <div class="alert alert-info">
                Aucun utilisateur enregistré.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Date d'inscription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td>
                                    <?php if ($user['is_admin'] == 1): ?>
                                        <span class="badge bg-danger">Administrateur</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Utilisateur</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo date('d/m/Y', strtotime($user['created_at'])); ?></td>
                                <td>
                                    <a href="index.php?controller=user&action=profile&id=<?php echo $user['id']; ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?controller=user&action=delete&id=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
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
    </div>
</div>
