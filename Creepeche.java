package laCrieer;

import javax.swing.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Date;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import javax.swing.border.EmptyBorder;

public class Creepeche extends JFrame {
    static Connection con;
    private JPanel contentPane;
    private JComboBox<String> comboBox;
    static String valeurbateu;

    public Creepeche() {
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setBounds(100, 100, 450, 300);
        contentPane = new JPanel();
        contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
        setContentPane(contentPane);
        GridBagLayout gridBagLayout = new GridBagLayout();
        gridBagLayout.columnWidths = new int[] {127, 116, 0, 0};
        gridBagLayout.rowHeights = new int[] {32, 0, 0, 47, 0, 0, 0, 84, 0};
        gridBagLayout.columnWeights = new double[] {0.0, 0.0, 1.0, Double.MIN_VALUE};
        gridBagLayout.rowWeights = new double[] {0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, Double.MIN_VALUE};
        contentPane.setLayout(gridBagLayout);
        
        JButton btnNewButton = new JButton("retour");
        GridBagConstraints gbc_btnNewButton = new GridBagConstraints();
        gbc_btnNewButton.fill = GridBagConstraints.BOTH;
        gbc_btnNewButton.insets = new Insets(0, 0, 5, 5);
        gbc_btnNewButton.gridx = 0;
        gbc_btnNewButton.gridy = 0;
        contentPane.add(btnNewButton, gbc_btnNewButton);
        
        JLabel lblNewLabel = new JLabel("nouvelle pêche");
        GridBagConstraints gbc_lblNewLabel = new GridBagConstraints();
        gbc_lblNewLabel.insets = new Insets(0, 0, 5, 0);
        gbc_lblNewLabel.fill = GridBagConstraints.BOTH;
        gbc_lblNewLabel.gridx = 2;
        gbc_lblNewLabel.gridy = 1;
        contentPane.add(lblNewLabel, gbc_lblNewLabel);
        
        JLabel lblNewLabel_1 = new JLabel("entrer le nom du bateau");
        GridBagConstraints gbc_lblNewLabel_1 = new GridBagConstraints();
        gbc_lblNewLabel_1.anchor = GridBagConstraints.EAST;
        gbc_lblNewLabel_1.fill = GridBagConstraints.VERTICAL;
        gbc_lblNewLabel_1.insets = new Insets(0, 0, 5, 5);
        gbc_lblNewLabel_1.gridx = 1;
        gbc_lblNewLabel_1.gridy = 3;
        contentPane.add(lblNewLabel_1, gbc_lblNewLabel_1);
        
        comboBox = new JComboBox<>();
        GridBagConstraints gbc_comboBox = new GridBagConstraints();
        gbc_comboBox.insets = new Insets(0, 0, 5, 0);
        gbc_comboBox.fill = GridBagConstraints.HORIZONTAL;
        gbc_comboBox.gridx = 2;
        gbc_comboBox.gridy = 3;
        contentPane.add(comboBox, gbc_comboBox);

        fillComboBoxWithBateaux(); // Remplissez la JComboBox avec les noms de bateaux
        
        JLabel lblNewLabel_2 = new JLabel("date du jour");
        GridBagConstraints gbc_lblNewLabel_2 = new GridBagConstraints();
        gbc_lblNewLabel_2.insets = new Insets(0, 0, 5, 5);
        gbc_lblNewLabel_2.gridx = 1;
        gbc_lblNewLabel_2.gridy = 4;
        contentPane.add(lblNewLabel_2, gbc_lblNewLabel_2);
        
        DateFormat shortDateFormat = DateFormat.getDateTimeInstance(DateFormat.SHORT, DateFormat.SHORT);
        Date todaysDate = new Date();
        
        JLabel lblNewLabel_3 = new JLabel(shortDateFormat.format(todaysDate).toString());
        GridBagConstraints gbc_lblNewLabel_3 = new GridBagConstraints();
        gbc_lblNewLabel_3.insets = new Insets(0, 0, 5, 0);
        gbc_lblNewLabel_3.gridx = 2;
        gbc_lblNewLabel_3.gridy = 4;
        contentPane.add(lblNewLabel_3, gbc_lblNewLabel_3);
        
        JButton btnNewButton_1 = new JButton("valider ");
        GridBagConstraints gbc_btnNewButton_1 = new GridBagConstraints();
        gbc_btnNewButton_1.insets = new Insets(0, 0, 5, 5);
        gbc_btnNewButton_1.gridx = 1;
        gbc_btnNewButton_1.gridy = 6;
        contentPane.add(btnNewButton_1, gbc_btnNewButton_1);

        // Ajoutez un gestionnaire d'événements au bouton "valider"
        btnNewButton_1.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                valeurbateu = (String) comboBox.getSelectedItem();
                getid();
                addtothetable();
            }
        });
    }
    

    public static Connection connexion() {
        try {
            con = DriverManager.getConnection("jdbc:mysql:///bddcriee", "root", "");
        } catch (SQLException e1) {
            e1.printStackTrace();
        }
        return con;
    }

    private void fillComboBoxWithBateaux() {
        Connection con = null;
        PreparedStatement stmt = null;
        ResultSet rs = null;

        try {
            con = DriverManager.getConnection("jdbc:mysql:///bddcriee", "root", "");
            String query = "SELECT nomBateaux FROM bateau";
            stmt = con.prepareStatement(query);
            rs = stmt.executeQuery();

            while (rs.next()) {
                String nomBateau = rs.getString("nomBateaux");
                comboBox.addItem(nomBateau);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            try {
                if (rs != null) rs.close();
                if (stmt != null) stmt.close();
                if (con != null) con.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }
    

	public Integer getid(){
		int idBateau = 0;
		Connection con = null;
        PreparedStatement stmt = null;
        ResultSet rs = null;
        try {
            con = DriverManager.getConnection("jdbc:mysql:///bddcriee", "root", "");
            String query = "SELECT idBateaux FROM bateau WHERE nomBateaux = ? ";
            stmt = con.prepareStatement(query);
            stmt.setString(1, valeurbateu);
            rs = stmt.executeQuery();
            while (rs.next()) {
                idBateau = rs.getInt("idBateaux");
            }
	    
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            try {
                if (rs != null) rs.close();
                if (stmt != null) stmt.close();
                if (con != null) con.close();
            } catch (SQLException e) {
                e.printStackTrace();
            } 
        }
		return idBateau;
	}
    private void addtothetable(){
    	Connection con = null;
        PreparedStatement stmt = null;
        int rs = 0;
        Date datePeche = new Date(); 
        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-mm-dd");

        java.util.Date utilDate = new java.util.Date();
        java.sql.Date formattedDate = new java.sql.Date(utilDate.getTime());
        try {
            con = DriverManager.getConnection("jdbc:mysql:///bddcriee", "root", "");
            String query = "INSERT INTO peche (idBateau, datePeche) VALUES (?,?)";
            stmt = con.prepareStatement(query);
            stmt.setInt(1, getid());            
            stmt.setDate(2, formattedDate);
            //stmt.setDate(1, new java.sql.Date(datePeche.getTime()));
            rs = stmt.executeUpdate();
            System.out.print("péche créé");
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            try {
                //if (rs != 0) rs.close();
                if (stmt != null) stmt.close();
                if (con != null) con.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }
    
    
    
    public static void main(String[] args) {
        EventQueue.invokeLater(new Runnable() {
            public void run() {
                try {
                    Creepeche frame = new Creepeche();
                    frame.setVisible(true);
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });
    }
    }

