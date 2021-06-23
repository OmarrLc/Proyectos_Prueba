package web;

import java.io.IOException;
import java.io.PrintWriter;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.*;

/**
 *
 * @author clopez
 */
@WebServlet("/HolaServlet")
public class HoraServlet extends HttpServlet{
    protected void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException{
        res.setContentType("text/html;charset=UTF-8");
        res.setHeader("refresh", "1");
        Date fecha = new Date();
        SimpleDateFormat formateador =  new SimpleDateFormat("'Hora Actualizada' HH:mm:ss");
        String horaConFormato = formateador.format(fecha);
        PrintWriter out = res.getWriter();
        out.print(horaConFormato);
        out.close();
    }
    
}
