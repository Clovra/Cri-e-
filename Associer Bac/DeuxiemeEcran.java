package atelierpro1;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.border.EmptyBorder;
import javax.swing.DefaultComboBoxModel;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.awt.event.ActionEvent;
import java.awt.Color;
import javax.swing.JTextArea;
import java.awt.SystemColor;
import java.awt.Font;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;
import javax.swing.JComboBox;
import javax.swing.JMenu;
import javax.swing.JList;
import atelierpro1.PremiereEcran;
import javax.swing.JTextField;

public class DeuxiemeEcran extends JFrame {
	Connexion cn = new Connexion();
	Statement st;
	ResultSet rst;
	int rst2;
	JTable tb1;
	JScrollPane scrl1;
	String def;
	String bvalue;

	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	private JTextField Lot_selectionner;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					DeuxiemeEcran frame = new DeuxiemeEcran();
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
	public DeuxiemeEcran () {
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 550, 550);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		
		JButton BoutonRetour2 = new JButton("Retour");
		BoutonRetour2.setBounds(20, 22, 74, 40);
		BoutonRetour2.setBackground(Color.RED);
		BoutonRetour2.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				PremiereEcran premierEcran = new PremiereEcran();
				premierEcran.setVisible(true);
				DeuxiemeEcran deuxiemeEcran = new DeuxiemeEcran();
				deuxiemeEcran.dispose();
			}
		});
		
		JTextArea InfoLot = new JTextArea();
		InfoLot.setEditable(false);
		InfoLot.setBounds(183, 59, 186, 32);
		InfoLot.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 17));
		InfoLot.setText("Informations sur le lot");
		InfoLot.setBackground(SystemColor.menu);
		
		JTextArea Description = new JTextArea();
		Description.setEditable(false);
		Description.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 15));
		Description.setBounds(82, 193, 132, 23);
		Description.setText("Lot Selectionner\r\n :");
		Description.setBackground(SystemColor.menu);
		contentPane.setLayout(null);
		contentPane.add(BoutonRetour2);
		contentPane.add(InfoLot);
		contentPane.add(Description);
		
		JComboBox NomBac = new JComboBox();
		NomBac.setBounds(224, 300, 96, 40);
		contentPane.add(NomBac);
		String requetes="SELECT nomBac FROM bac";
		try {
			st=cn.laconnexion().createStatement();
			rst=st.executeQuery(requetes);
			while(rst.next()) {
				NomBac.addItem(rst.getString("nomBac"));
			}
		}
		catch(SQLException ex) {
			
		}
		
		
		JTextArea TypeBac = new JTextArea();
		TypeBac.setEditable(false);
		TypeBac.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 15));
		TypeBac.setToolTipText("");
		TypeBac.setText("Nom du bac a ajouter");
		TypeBac.setBackground(SystemColor.menu);
		TypeBac.setBounds(56, 305, 158, 23);
		contentPane.add(TypeBac);
		
		Lot_selectionner = new JTextField(PremiereEcran.Value);
		Lot_selectionner.setEditable(false);
		Lot_selectionner.setBounds(224, 192, 96, 32);
		contentPane.add(Lot_selectionner);
		Lot_selectionner.setColumns(10);
		
		
		
		
		
		
		JButton BoutonAjouter2 = new JButton("Ajouter");
		BoutonAjouter2.setForeground(Color.WHITE);
		BoutonAjouter2.setBackground(new Color(148, 0, 211));
		BoutonAjouter2.setBounds(194, 406, 150, 50);
		contentPane.add(BoutonAjouter2);
		BoutonAjouter2.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				bvalue = NomBac.getSelectedItem().toString();
				try {
					st=cn.laconnexion().createStatement();
					rst2=st.executeUpdate("UPDATE lot SET Bacnom = '"+bvalue+"' WHERE nomLot ='"+PremiereEcran.Value+"'");
					
				}
					
				catch(SQLException ex) {
					
				}
				TroisiemeEcran troisiemeEcran = new TroisiemeEcran();
				troisiemeEcran.setVisible(true);
				DeuxiemeEcran deuxiemeEcran = new DeuxiemeEcran();
				deuxiemeEcran.dispose();
			}
		});
	}
}
