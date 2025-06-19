    </div>

    <!-- Pied de page -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Thumbflow</h5>
                    <p>Une plateforme moderne pour partager vos idées et interagir avec la communauté.</p>
                </div>
                <div class="col-md-3">
                    <h5>Liens</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Accueil</a></li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="index.php?controller=post&action=create" class="text-white">Créer un post</a></li>
                        <li><a href="index.php?controller=user&action=profile" class="text-white">Mon profil</a></li>
                        <?php else: ?>
                        <li><a href="index.php?controller=user&action=login" class="text-white">Connexion</a></li>
                        <li><a href="index.php?controller=user&action=register" class="text-white">Inscription</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i> contact@thumbflow.com</li>
                        <li><i class="fas fa-phone me-2"></i> +33 1 23 45 67 89</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> Thumbflow. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript personnalisé -->
    <script src="assets/js/script.js"></script>
</body>
</html>
