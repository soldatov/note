pipeline {
    agent any

    environment {
        PROJECT_NAME = "template"
    }

    parameters {
        string(name: 'PROJECT_FOR_BUILD', defaultValue: 'template', description: 'Проект для сборки')
        string(name: 'BRANCH_FOR_BUILD', defaultValue: 'master', description: 'Ветка для сборки')
    }

    stages {
        stage('Clean') {
            steps {
                cleanWs()
            }
        }
        stage('Info') {
            steps {
                echo "${PROJECT_FOR_BUILD}"
                echo "${params.PROJECT_FOR_BUILD}"
                echo "${BRANCH_FOR_BUILD}"
                echo "${params.BRANCH_FOR_BUILD}"

                sh "pwd"
                sh "ls -l"
            }
        }
    }
}