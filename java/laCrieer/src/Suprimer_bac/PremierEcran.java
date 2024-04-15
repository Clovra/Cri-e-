package Suprimer_bac;

import java.awt.EventQueue;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.border.EmptyBorder;

import Suprimer_bac.Connexion;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.JTextArea;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.UIManager;
import javax.swing.JComboBox;
import javax.swing.JButton;
import javax.swing.LayoutStyle.ComponentPlacement;

public class PremierEcran extends JFrame {

	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	Suprimer_bac.Connexion cn = new Connexion();
	Statement st;
	ResultSet rst;
	JTable tb1;
	JScrollPane scrl1;
	static String Valeur;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					PremierEcran frame = new PremierEcran();
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
	public PremierEcran() {
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		
		JTextArea Titre = new JTextArea();
		Titre.setEditable(false);
		Titre.setBackground(UIManager.getColor("CheckBox.background"));
		Titre.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 18));
		Titre.setText("Supprimer un bac d'un lot");
		
		JComboBox ListeLot = new JComboBox();
		ListeLot.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 11));
		String requete="SELECT DISTINCT nomLot FROM lot";
		try {
			st=cn.laconnexion().createStatement();
			rst=st.executeQuery(requete);
			while(rst.next()) {
				ListeLot.addItem(rst.getString("nomLot"));
			}
		}
		catch(SQLException ex) {
			
		}
		
		
		JTextArea SelectionLot = new JTextArea();
		SelectionLot.setEditable(false);
		SelectionLot.setBackground(UIManager.getColor("CheckBox.background"));
		SelectionLot.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 13));
		SelectionLot.setText("Selection d'un lot");
		String requete2="SELECT DISTINCT nomLot FROM lot";
		
		
		JButton BoutonValider = new JButton("Valider");
		BoutonValider.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				Valeur = ListeLot.getSelectedItem().toString();
				SecondEcran secondEcran = new SecondEcran();
				secondEcran.setVisible(true);
				PremierEcran premierEcran = new PremierEcran();
				premierEcran.dispose();
				
			
				
			}
		});
		
		
		
		GroupLayout gl_contentPane = new GroupLayout(contentPane);
		gl_contentPane.setHorizontalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING)
						.addGroup(gl_contentPane.createSequentialGroup()
							.addGap(94)
							.addComponent(Titre, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE))
						.addGroup(gl_contentPane.createSequentialGroup()
							.addGap(34)
							.addComponent(SelectionLot, GroupLayout.PREFERRED_SIZE, 112, GroupLayout.PREFERRED_SIZE)
							.addPreferredGap(ComponentPlacement.RELATED)
							.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING, false)
								.addComponent(ListeLot, 0, GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
								.addComponent(BoutonValider, GroupLayout.DEFAULT_SIZE, 104, Short.MAX_VALUE))))
					.addGap(104))
		);
		gl_contentPane.setVerticalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addComponent(Titre, GroupLayout.PREFERRED_SIZE, 25, GroupLayout.PREFERRED_SIZE)
					.addGap(89)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.BASELINE)
						.addComponent(SelectionLot, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE)
						.addComponent(ListeLot, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE))
					.addGap(43)
					.addComponent(BoutonValider)
					.addContainerGap(37, Short.MAX_VALUE))
		);
		contentPane.setLayout(gl_contentPane);
	}
}
