package atelierpro1;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.border.EmptyBorder;
import javax.swing.JTextArea;
import javax.swing.ComboBoxModel;
import javax.swing.DefaultComboBoxModel;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import java.awt.SystemColor;
import java.awt.Font;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;
import java.awt.event.ActionEvent;
import javax.swing.JComboBox;
import javax.swing.LayoutStyle.ComponentPlacement;
import java.awt.Color;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class PremiereEcran extends JFrame {
	Connexion cn = new Connexion();
	Statement st;
	ResultSet rst;
	JTable tb1;
	JScrollPane scrl1;
	String requetes;
	static String Value;
	
	
	

	private static final long serialVersionUID = 1L;
	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		
		
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					PremiereEcran frame = new PremiereEcran();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	
	public PremiereEcran() {
		
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 550, 550);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		
		JTextArea Titre1 = new JTextArea();
		Titre1.setEditable(false);
		Titre1.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 17));
		Titre1.setToolTipText("");
		Titre1.setText("Choisir un lot au bac associé");
		Titre1.setBackground(SystemColor.menu);
		
		JButton BoutonRetour1 = new JButton("Retour");
		BoutonRetour1.setForeground(new Color(0, 0, 0));
		BoutonRetour1.setBackground(Color.RED);
		BoutonRetour1.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				
				
				PremiereEcran premierEcran = new PremiereEcran();
				premierEcran.dispose();
			}
		});
		
	
		
		JComboBox AfficheLot = new JComboBox();
		AfficheLot.setEditable(false);
		requetes="SELECT nomLot FROM lot";
		try {
			st=cn.laconnexion().createStatement();
			rst=st.executeQuery(requetes);
			while(rst.next()) {
				AfficheLot.addItem(rst.getString("nomLot"));
			}
		}
		catch(SQLException ex) {
			
		}
		
		
		
		
		  
		

		
		
		
		JTextArea ChoixLot = new JTextArea();
		ChoixLot.setEditable(false);
		ChoixLot.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 15));
		ChoixLot.setText("Choisir un lot");
		ChoixLot.setBackground(SystemColor.menu);
		
		JButton BoutonValider1 = new JButton("Valider");
		BoutonValider1.setForeground(Color.WHITE);
		BoutonValider1.setBackground(new Color(148, 0, 211));
		BoutonValider1.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				Value = AfficheLot.getSelectedItem().toString();
				DeuxiemeEcran deuxiemeEcran = new DeuxiemeEcran();
				deuxiemeEcran.setVisible(true);
				PremiereEcran premiereEcran = new PremiereEcran();
				premiereEcran.dispose();
			
				
			}
		});
		
		GroupLayout gl_contentPane = new GroupLayout(contentPane);
		gl_contentPane.setHorizontalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addGap(145)
					.addComponent(Titre1, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE)
					.addContainerGap(154, Short.MAX_VALUE))
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap(91, Short.MAX_VALUE)
					.addComponent(ChoixLot, GroupLayout.PREFERRED_SIZE, 111, GroupLayout.PREFERRED_SIZE)
					.addGap(18)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING, false)
						.addComponent(BoutonValider1, Alignment.TRAILING, GroupLayout.DEFAULT_SIZE, GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
						.addComponent(AfficheLot, Alignment.TRAILING, 0, 95, Short.MAX_VALUE))
					.addGap(209))
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addComponent(BoutonRetour1, GroupLayout.PREFERRED_SIZE, 75, GroupLayout.PREFERRED_SIZE)
					.addContainerGap(439, Short.MAX_VALUE))
		);
		gl_contentPane.setVerticalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addComponent(BoutonRetour1, GroupLayout.PREFERRED_SIZE, 40, GroupLayout.PREFERRED_SIZE)
					.addGap(29)
					.addComponent(Titre1, GroupLayout.PREFERRED_SIZE, 40, GroupLayout.PREFERRED_SIZE)
					.addGap(104)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.BASELINE)
						.addComponent(ChoixLot, GroupLayout.PREFERRED_SIZE, 23, GroupLayout.PREFERRED_SIZE)
						.addComponent(AfficheLot, GroupLayout.PREFERRED_SIZE, 34, GroupLayout.PREFERRED_SIZE))
					.addGap(111)
					.addComponent(BoutonValider1, GroupLayout.PREFERRED_SIZE, 44, GroupLayout.PREFERRED_SIZE)
					.addGap(88))
		);
		contentPane.setLayout(gl_contentPane);
		
		
		
		
		
	}
	
	
	

	
	
}
