package site;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JDesktopPane;
import javax.swing.JTextArea;
import javax.swing.JTextField;
import javax.swing.JButton;

public class poidslots extends JFrame {

	private JPanel contentPane;
	private JTextField textField;
	private JTextField textField_1;
	private JTextArea txtrSaisirLePoids_2;
	private JTextField textField_2;
	private JTextArea txtrSaisirLePoids_3;
	private JTextField textField_3;
	private JTextArea txtrSaisirLePoids_4;
	private JTextField textField_4;
	private JButton btnNewButton;
	private JButton btnNewButton_1;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					poidslots frame = new poidslots();
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
	public poidslots() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		
		JTextArea txtrSaisirLePoids_1 = new JTextArea();
		txtrSaisirLePoids_1.setText("Saisir la tare du premier bac");
		contentPane.add(txtrSaisirLePoids_1);
		
		textField_1 = new JTextField();
		textField_1.setColumns(10);
		contentPane.add(textField_1);
		
		JTextArea txtrSaisirLePoids = new JTextArea();
		txtrSaisirLePoids.setText("Saisir la tare du deuxième bac");
		contentPane.add(txtrSaisirLePoids);
		
		textField = new JTextField();
		contentPane.add(textField);
		textField.setColumns(10);
		
		txtrSaisirLePoids_2 = new JTextArea();
		txtrSaisirLePoids_2.setText("Saisir la tare du troisième bac");
		contentPane.add(txtrSaisirLePoids_2);
		
		textField_2 = new JTextField();
		textField_2.setColumns(10);
		contentPane.add(textField_2);
		
		txtrSaisirLePoids_3 = new JTextArea();
		txtrSaisirLePoids_3.setText("Saisir la tare du quatrième bac");
		contentPane.add(txtrSaisirLePoids_3);
		
		textField_3 = new JTextField();
		textField_3.setColumns(10);
		contentPane.add(textField_3);
		
		txtrSaisirLePoids_4 = new JTextArea();
		txtrSaisirLePoids_4.setText("Saisir la tare du nième bac         ");
		contentPane.add(txtrSaisirLePoids_4);
		
		textField_4 = new JTextField();
		textField_4.setColumns(10);
		contentPane.add(textField_4);
		
		btnNewButton = new JButton("Annuler");
		contentPane.add(btnNewButton);
		
		btnNewButton_1 = new JButton("Valider");
		contentPane.add(btnNewButton_1);
	}

}
