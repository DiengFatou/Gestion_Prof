pipeline {
    agent any
    
    environment {
        DOCKER_IMAGE = 'laravel_app_image'
        DOCKER_REGISTRY = 'your_docker_registry_url' 
        REPO_URL = 'https://github.com/DiengFatou/Gestion_Prof.git'
    }

    stages {
        stage('Checkout') {
            steps {
                // Récupération du code depuis Git
                git branch: 'main', url: "${REPO_URL}"
            }
        }
        
        stage('Install Dependencies') {
            steps {
                script {
                    // Installer les dépendances Laravel via Composer
                    sh 'composer install'
                }
            }
        }
        
        stage('Run Unit Tests') {
            steps {
                script {
                    // Exécuter les tests PHPUnit
                    sh './vendor/bin/phpunit'
                }
            }
        }
        
        stage('Build Docker Image') {
            steps {
                script {
                    // Construire l'image Docker
                    sh 'docker build -t ${DOCKER_IMAGE} .'
                }
            }
        }
        
        stage('Push Docker Image') {
            steps {
                script {
                    // Tagger et pousser l'image vers le registre Docker
                    sh 'docker tag ${DOCKER_IMAGE} ${DOCKER_REGISTRY}/${DOCKER_IMAGE}'
                    sh 'docker push ${DOCKER_REGISTRY}/${DOCKER_IMAGE}'
                }
            }
        }
        
        stage('Deploy to Staging') {
            steps {
                script {
                    // Déployer l'image Docker sur l'environnement de staging
                    sh 'docker run -d -p 8080:80 ${DOCKER_REGISTRY}/${DOCKER_IMAGE}'
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline réussie !'
        }
        failure {
            echo 'La pipeline a échoué.'
        }
    }
}
