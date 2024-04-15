package laCrieer;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class ConexionBDD {
    public static Connection  con () {
        // Informations de connexion à la base de données
        String url = "jdbc:mysql://localhost:3306/bddcriee"; // URL de la base de données
        String utilisateur = "root"; // Nom d'utilisateur MySQL
        String motDePasse = "root"; // Mot de passe MySQL

        // Créer un objet Connection
        Connection connexion = null;

        try {
            // Charger le pilote JDBC
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Établir la connexion à la base de données
            connexion = DriverManager.getConnection(url, utilisateur, motDePasse);

            if (connexion != null) {
                System.out.println("Connexion à la base de données réussie !");
                // Vous pouvez maintenant interagir avec la base de données ici
            } else {
                System.err.println("Échec de la connexion à la base de données.");
            }

        } catch (ClassNotFoundException e) {
            System.err.println("Le pilote MySQL JDBC n'a pas pu être chargé.");
            e.printStackTrace();
        } catch (SQLException e) {
            System.err.println("Erreur lors de la connexion à la base de données.");
            e.printStackTrace();
        } 
		return connexion;
    }
}
