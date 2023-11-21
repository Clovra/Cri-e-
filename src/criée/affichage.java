package criée;

import java.awt.BorderLayout;
import java.awt.EventQueue;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableModel;
import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.JComboBox;
import javax.swing.JTable;
import javax.swing.JTree;
import javax.swing.JTextField;
import javax.swing.JButton;
import javax.swing.JScrollPane;
import javax.swing.table.TableColumnModel;
import javax.swing.table.TableColumn;
import javax.swing.table.TableCellRenderer; 
import java.awt.Component; 

public class affichage extends JFrame {
    static Connection con;
    private JPanel contentPane;
    private JTable table;
    private JTextField textField;
    private DefaultTableModel tableModel;

    public static void main(String[] args) {
        EventQueue.invokeLater(new Runnable() {
            public void run() {
                try {
                    affichage frame = new affichage();
                    frame.setVisible(true);
                } catch (Exception e) {
                    e.printStackTrace();
                }
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

    public affichage() {
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setBounds(100, 100, 1591, 199);
        contentPane = new JPanel();
        contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
        setContentPane(contentPane);
        contentPane.setLayout(null);

        JLabel lblNewLabel = new JLabel("Pêche du jour");
        lblNewLabel.setFont(new Font("Tahoma", Font.PLAIN, 28));
        lblNewLabel.setBounds(36, 25, 192, 60);
        contentPane.add(lblNewLabel);

        textField = new JTextField();
        textField.setBounds(243, 52, 86, 20);
        contentPane.add(textField);
        textField.setColumns(10);

        tableModel = new DefaultTableModel();
        tableModel.addColumn("id");
        tableModel.addColumn("idDatePeche");
        tableModel.addColumn("idBateau");
        tableModel.addColumn("idLot");
        tableModel.addColumn("idEspece");
        tableModel.addColumn("idTaille");
        tableModel.addColumn("idPresentation");
        tableModel.addColumn("idQualite");
        tableModel.addColumn("idBac");
        tableModel.addColumn("poidsBrutLot");
        tableModel.addColumn("prixPlancherLots");
        tableModel.addColumn("prixDepartLots");
        tableModel.addColumn("prixEcheresLots");
        tableModel.addColumn("dateEnchereLots");
        tableModel.addColumn("HeureDebutEnchereLots");
        tableModel.addColumn("codeEtatLots");
        tableModel.addColumn("idAcheteurLots");
        tableModel.addColumn("idFactureLots");

        // Ajout de la table à un JScrollPane
        JScrollPane scrollPane = new JScrollPane();
        scrollPane.setBounds(10, 96, 1555, 51);
        contentPane.add(scrollPane);
        table = new JTable(tableModel);
        scrollPane.setViewportView(table);
 
        JButton btnValider = new JButton("VALIDER");
        btnValider.setBounds(361, 47, 114, 30);
        contentPane.add(btnValider);

        btnValider.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                String identifiant = textField.getText();
                fetchAndDisplayData(identifiant);
                resizeColumns();
            }
        });
    }

    private void resizeColumns() {
        TableColumnModel columnModel = table.getColumnModel();
        for (int col = 0; col < table.getColumnCount(); col++) {
            int maxWidth = 0;
            for (int row = 0; row < table.getRowCount(); row++) {
                TableCellRenderer renderer = table.getCellRenderer(row, col);
                Component comp = table.prepareRenderer(renderer, row, col);
                maxWidth = Math.max(comp.getPreferredSize().width, maxWidth);
            }
            TableColumn column = columnModel.getColumn(col);
            column.setPreferredWidth(maxWidth + 10); // Add some padding
        }
    }

    private void fetchAndDisplayData(String identifiant) {
        try {
            Connection connection = connexion();
            if (connection != null) {
                String query = "SELECT * FROM lot WHERE id = ?";
                PreparedStatement preparedStatement = connection.prepareStatement(query);
                preparedStatement.setString(1, identifiant);
                ResultSet resultSet = preparedStatement.executeQuery();

                while (tableModel.getRowCount() > 0) {
                    tableModel.removeRow(0);
                }

                while (resultSet.next()) {
                    Object[] rowData = new Object[17];
                    for (int i = 0; i < 17; i++) {
                        rowData[i] = resultSet.getObject(i + 1);
                    }
                    tableModel.addRow(rowData);
                }

                resultSet.close();
                preparedStatement.close();
                connection.close();
            }
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }
}