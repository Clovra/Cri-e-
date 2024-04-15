package laCrieer;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.EventQueue;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

public class acceuil extends JFrame {

    private JPanel contentPane;

    /**
     * Launch the application.
     */
    public static void main(String[] args) {
        EventQueue.invokeLater(new Runnable() {
            public void run() {
                try {
                    acceuil frame = new acceuil();
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
    public acceuil() {
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setBounds(100, 100, 450, 300);
        contentPane = new JPanel();
        contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

        setContentPane(contentPane);

        JButton creepechelog = new JButton("crée peche");
        creepechelog.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                // Lorsque le bouton est cliqué, exécuter Creepeche.java
                	Creepeche pb = new Creepeche();
                    pb.setVisible(true);

            }
        });
        contentPane.add(creepechelog);

        JButton btn_Associer = new JButton("Associer Bac");
        btn_Associer.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                // Lorsque le bouton est cliqué, exécuter Creepeche.java
            		Associer_Bac.PremiereEcran pb = new Associer_Bac.PremiereEcran();
                    pb.setVisible(true);

            }
        });
        contentPane.add(btn_Associer);
        
        
        
        JButton btn_creeebac = new JButton("créée bac");
        btn_creeebac.addActionListener(new ActionListener() {
        	public void actionPerformed(ActionEvent e) {
                // Lorsque le bouton est cliqué, exécuter Creepeche.java
        			Creer_Bac.PremiereEcran pb = new Creer_Bac.PremiereEcran();
                    pb.setVisible(true);

            }
        });
        contentPane.add(btn_creeebac);
        

        
        
        JButton btn_Suprimer = new JButton("Suprimer bac");
        btn_Suprimer.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                // Lorsque le bouton est cliqué, exécuter Creepeche.java
            		Suprimer_bac.PremierEcran pb = new Suprimer_bac.PremierEcran();
                    pb.setVisible(true);

            }
        });
        
        
        contentPane.add(btn_Suprimer);
    }
}

