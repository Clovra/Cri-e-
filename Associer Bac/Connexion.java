package atelierpro1;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;


public class Connexion {
	
	Connection con;
	public Connexion() {
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			con= DriverManager.getConnection("jdbc:mysql:///bddcriee","root","");
			System.out.println("La connexion a reussi");
		}
		catch(Exception ex) {
			System.out.println("Problème de connexion a la base de donnée. ");
		}
	}
	public Connection laconnexion() {
		return con;
	}
	

}
