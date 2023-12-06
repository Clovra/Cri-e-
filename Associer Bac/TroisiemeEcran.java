package atelierpro1;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JScrollPane;
import javax.swing.JButton;
import javax.swing.JTextArea;
import java.awt.SystemColor;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.Font;
import java.awt.Color;

public class TroisiemeEcran extends JFrame {

	private static final long serialVersionUID = 1L;
	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					TroisiemeEcran frame = new TroisiemeEcran();
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
	public TroisiemeEcran() {
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 550, 550);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JButton BoutonRetourAccueil = new JButton("Retour à l'accueil");
		BoutonRetourAccueil.setForeground(Color.WHITE);
		BoutonRetourAccueil.setBackground(new Color(148, 0, 211));
		BoutonRetourAccueil.setBounds(149, 292, 226, 74);
		contentPane.add(BoutonRetourAccueil);
		BoutonRetourAccueil.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				// mettre la redirection vers la page d'accueil.
				
				TroisiemeEcran troisiemeEcran = new TroisiemeEcran();
				troisiemeEcran.dispose();
				PremiereEcran premiereEcran = new PremiereEcran();
				premiereEcran.setVisible(true);
			}
		});
		
		JTextArea Confirmation = new JTextArea();
		Confirmation.setEditable(false);
		Confirmation.setWrapStyleWord(true);
		Confirmation.setFont(new Font("Microsoft JhengHei", Font.PLAIN, 20));
		Confirmation.setText("Le bac a bien été ajouter au lot");
		Confirmation.setBackground(SystemColor.menu);
		Confirmation.setBounds(114, 150, 290, 48);
		contentPane.add(Confirmation);
	}

}
