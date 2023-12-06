package usertstory1;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.border.EmptyBorder;


import javax.swing.JTextArea;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.UIManager;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javax.swing.JComboBox;
import javax.swing.JButton;
import javax.swing.LayoutStyle.ComponentPlacement;
import java.awt.Color;
import javax.swing.JTextField;

public class PremiereEcran extends JFrame {
	
	Connexion cn = new Connexion();
	Statement st;
	int rst;
	JTable tb1;
	JScrollPane scrl1;

	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	private JTextField NomBac;

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
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		
		JTextArea TitreAjoutBac = new JTextArea();
		TitreAjoutBac.setEditable(false);
		TitreAjoutBac.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 17));
		TitreAjoutBac.setText("Créer un bac");
		TitreAjoutBac.setBackground(UIManager.getColor("CheckBox.background"));
		
		JTextArea TypeDeBac = new JTextArea();
		TypeDeBac.setEditable(false);
		TypeDeBac.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 13));
		TypeDeBac.setText("Type de Bac");
		TypeDeBac.setBackground(UIManager.getColor("CheckBox.background"));
		
		JComboBox AjouterTypeBac = new JComboBox();
		AjouterTypeBac.addItem("2.50");
		AjouterTypeBac.addItem("4");
		
		JTextArea NomDuBac = new JTextArea();
		NomDuBac.setEditable(false);
		NomDuBac.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 13));
		NomDuBac.setText("Nom du bac :");
		NomDuBac.setBackground(UIManager.getColor("CheckBox.background"));
		
		NomBac = new JTextField();
		NomBac.setColumns(10);
		
		
		
		JButton CréerBac = new JButton("Ajouter Bac");
		CréerBac.setBackground(new Color(240, 240, 240));
		CréerBac.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
		String Value = AjouterTypeBac.getSelectedItem().toString();
		String lenom = NomBac.getText().toString();
		
		try {
			
			st=cn.laconnexion().createStatement();
			rst=st.executeUpdate("INSERT INTO bac (TypeBac, nomBac) VALUES ('"+Value+"','"+lenom+"')");
			}
		catch(SQLException ex) {
			
		}
		
		DeuxiemeEcran deuxiemeEcran = new DeuxiemeEcran();
		deuxiemeEcran.setVisible(true);
		PremiereEcran premiereEcran = new PremiereEcran();
		premiereEcran.dispose();
		System.out.println(lenom);
		System.out.println(Value);
			}
		});
		
		
		
		GroupLayout gl_contentPane = new GroupLayout(contentPane);
		gl_contentPane.setHorizontalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING)
						.addComponent(TypeDeBac, GroupLayout.PREFERRED_SIZE, 94, GroupLayout.PREFERRED_SIZE)
						.addComponent(NomDuBac, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE))
					.addGap(46)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING)
						.addComponent(NomBac, GroupLayout.DEFAULT_SIZE, 123, Short.MAX_VALUE)
						.addComponent(AjouterTypeBac, 0, 105, Short.MAX_VALUE)
						.addComponent(TitreAjoutBac, GroupLayout.DEFAULT_SIZE, 123, Short.MAX_VALUE)
						.addComponent(CréerBac, GroupLayout.DEFAULT_SIZE, 123, Short.MAX_VALUE))
					.addGap(151))
		);
		gl_contentPane.setVerticalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addComponent(TitreAjoutBac, GroupLayout.PREFERRED_SIZE, 38, GroupLayout.PREFERRED_SIZE)
					.addGap(33)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.BASELINE)
						.addComponent(TypeDeBac, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE)
						.addComponent(AjouterTypeBac, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE))
					.addGap(47)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.BASELINE)
						.addComponent(NomDuBac, GroupLayout.PREFERRED_SIZE, 18, GroupLayout.PREFERRED_SIZE)
						.addComponent(NomBac, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE))
					.addGap(35)
					.addComponent(CréerBac)
					.addContainerGap(24, Short.MAX_VALUE))
		);
		contentPane.setLayout(gl_contentPane);
	}
}
