package web;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.*;

/**
 *
 * @author clopez
 */
@WebServlet("/GeneracionExcelServlet")
public class GeneracionExcelServlet extends HttpServlet{
    protected void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException{
        //Indicamos el tipo de respuesta al navegador
        res.setContentType("application/vnd.ms-excel");
        res.setHeader("Content-Disposition", "attachment;filename=excelEjemplo.xls");
       
        //Indicar al navegador que no guarde caache
        res.setHeader("Pragma", "no-chache");
        res.setHeader("Cache-Control", "no-store");
        res.setDateHeader("Expire", -1);
        
        //Desplegamos informacion al cliente
        PrintWriter out = res.getWriter();
        out.println("\tValores");
        out.println("\t1");
        out.println("\t2");
        out.println("Total\t=SUMA(B2:B3)");
        out.close();
    }
    
}
