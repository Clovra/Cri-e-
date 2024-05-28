package Supprimer_Bac;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.border.EmptyBorder;

import Supprimer_Bac.PremierEcran;
import Supprimer_Bac.Connexion;

import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.JTextArea;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javax.swing.UIManager;
import javax.swing.JComboBox;
import javax.swing.JButton;
import javax.swing.LayoutStyle.ComponentPlacement;

public class SecondEcran extends JFrame {

	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	Connexion cn = new Connexion();
	Statement st;
	ResultSet rst;
	int rst2;
	JTable tb1;
	JScrollPane scrl1;
	String valeurBac;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					SecondEcran frame = new SecondEcran();
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
	public SecondEcran() {
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		
		JTextArea txtSelectionBac = new JTextArea();
		txtSelectionBac.setEditable(false);
		txtSelectionBac.setText("Selection du bac");
		txtSelectionBac.setBackground(UIManager.getColor("CheckBox.background"));
		txtSelectionBac.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 13));
		
		JTextArea txtrSupprimerLeBac = new JTextArea();
		txtrSupprimerLeBac.setEditable(false);
		txtrSupprimerLeBac.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 18));
		txtrSupprimerLeBac.setText("Supprimer le bac");
		txtrSupprimerLeBac.setBackground(UIManager.getColor("CheckBox.background"));
		
		JComboBox SelectionBac = new JComboBox();
		SelectionBac.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 11));
		String requete2 = "SELECT Bacnom FROM lot WHERE nomLot = '"+PremierEcran.Valeur+"' AND Bacnom is NOT NULL";
		try {
			st=cn.laconnexion().createStatement();
			rst=st.executeQuery(requete2);
			while(rst.next()) {
				SelectionBac.addItem(rst.getString("Bacnom"));
			}
		}
		catch(SQLException ex) {
			
		}
		
		JButton BoutonSupprimer = new JButton("Supprimer");
		BoutonSupprimer.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				valeurBac = SelectionBac.getSelectedItem().toString();
				try {
					st=cn.laconnexion().createStatement();
					rst2=st.executeUpdate("UPDATE lot SET Bacnom = NULL WHERE Bacnom = '"+valeurBac+"' AND nomLot = '"+PremierEcran.Valeur+"'");
					
				}
					
				catch(SQLException ex) {
					
				}
				TroisEcran troisEcran = new TroisEcran();
				troisEcran.setVisible(true);
				SecondEcran secondEcran = new SecondEcran();
				secondEcran.dispose();
				
			}
		});
		
	
		
		
		
		
		
		
		
		
		
		
		GroupLayout gl_contentPane = new GroupLayout(contentPane);
		gl_contentPane.setHorizontalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING)
						.addGroup(gl_contentPane.createSequentialGroup()
							.addGap(20)
							.addComponent(txtSelectionBac, GroupLayout.PREFERRED_SIZE, 106, GroupLayout.PREFERRED_SIZE)
							.addGap(18)
							.addGroup(gl_contentPane.createParallelGroup(Alignment.TRAILING, false)
								.addComponent(BoutonSupprimer, Alignment.LEADING, GroupLayout.DEFAULT_SIZE, GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
								.addComponent(SelectionBac, Alignment.LEADING, 0, 102, Short.MAX_VALUE)))
						.addGroup(gl_contentPane.createSequentialGroup()
							.addGap(121)
							.addComponent(txtrSupprimerLeBac, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE)))
					.addContainerGap(154, Short.MAX_VALUE))
		);
		gl_contentPane.setVerticalGroup(
			gl_contentPane.createParallelGroup(Alignment.TRAILING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addComponent(txtrSupprimerLeBac, GroupLayout.PREFERRED_SIZE, 27, GroupLayout.PREFERRED_SIZE)
					.addPreferredGap(ComponentPlacement.RELATED, 77, Short.MAX_VALUE)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.BASELINE)
						.addComponent(txtSelectionBac, GroupLayout.PREFERRED_SIZE, 25, GroupLayout.PREFERRED_SIZE)
						.addComponent(SelectionBac, GroupLayout.PREFERRED_SIZE, 25, GroupLayout.PREFERRED_SIZE))
					.addGap(46)
					.addComponent(BoutonSupprimer)
					.addGap(41))
		);
		contentPane.setLayout(gl_contentPane);
	}
}
