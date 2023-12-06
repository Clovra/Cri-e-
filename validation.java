package site;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JTextPane;
import javax.swing.JButton;
import javax.swing.JTextField;
import javax.swing.JToggleButton;

public class validation extends JFrame {

	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					validation frame = new validation();
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
	public validation() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 855, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		
		JTextPane txtpnMerciDavoirSaisi = new JTextPane();
		txtpnMerciDavoirSaisi.setText("Merci d'avoir saisi le poids de chaques bacs du lot <idLot>. Son poids total est de <poidsBrutLot>. Vos informations ont bien été sauvegardées. Retour à la page gestion des lots");
		contentPane.add(txtpnMerciDavoirSaisi);
		
		JToggleButton tglbtnNewToggleButton = new JToggleButton("Retour à la page gestion des lots");
		contentPane.add(tglbtnNewToggleButton);
	}

}
