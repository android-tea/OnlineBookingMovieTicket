package dsafinal;

import java.util.Scanner;
import java.util.Stack;

class ExpressionTreeNode {
    String value;
    ExpressionTreeNode left, right;

    // Constructor for creating a new node
    ExpressionTreeNode(String value) {
        this.value = value;
        this.left = null;
        this.right = null;
    }
}

public class ExpressionTree {
    ExpressionTreeNode root;

    // Constructor for the expression tree
 public ExpressionTree(ExpressionTreeNode root) {
        this.root = root;
    }

    // Method to evaluate the expression tree
    public double evaluate() {
        return evaluateNode(root);
    }

    // Recursive method to evaluate nodes
    private double evaluateNode(ExpressionTreeNode node) {
        if (node == null) {
            return 0;
        }
        // If the node is a number, return its value
        if (isNumeric(node.value)) {
            return Double.parseDouble(node.value);
        } else {
            // Otherwise, evaluate the left and right subtrees
            double leftVal = evaluateNode(node.left);
            double rightVal = evaluateNode(node.right);
            return applyOperator(node.value, leftVal, rightVal);
        }
    }

    // Check if a string is numeric
    private boolean isNumeric(String str) {
        try {
            Double.parseDouble(str);
            return true;
        } catch (NumberFormatException e) {
            return false;
        }
    }

    // Apply the operator to the left and right values
    private double applyOperator(String operator, double left, double right) {
        switch (operator) {
            case "+":
                return left + right;
            case "-":
                return left - right;
            case "*":
                return left * right;
            case "/":
                if (right == 0) {
                    throw new ArithmeticException("Division by zero");
                }
                return left / right;
            default:
                throw new UnsupportedOperationException("Unknown operator: " + operator);
        }
    }
}

public class MathExpressionCalc {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("======= Math Expression Calculator! ========\n" + "\nEnter an expression in postfix notation: ");
       
        String expression = scanner.nextLine();
        
        try {
        ExpressionTree tree = parseExpression(expression);
        double result = tree.evaluate();
        System.out.println("Result: " + result);
        
        } catch (Exception e) {
        	System.out.println(" Error : " + e.getMessage());
        } finally {
        scanner.close();
        }
    }

    // Method to parse the expression from postfix notation
    private static ExpressionTree parseExpression(String expression) {
        Stack<ExpressionTreeNode> stack = new Stack<>();
        String[] tokens = expression.split(" ");
        
        for (String token : tokens) {
            // If the token is an operator, pop two nodes from the stack
            if (isOperator(token)) {
            	if (stack.size() < 2) {
            		throw new IllegalArgumentException("Invalid expression" + token + " ");
            	}
                ExpressionTreeNode right = stack.pop();
                ExpressionTreeNode left = stack.pop();
                ExpressionTreeNode newNode = new ExpressionTreeNode(token);
                newNode.left = left;
                newNode.right = right;
                stack.push(newNode);
            } else {
                // If the token is a number, push it onto the stack
                stack.push(new ExpressionTreeNode(token));
            }
        }
        return new ExpressionTree(stack.pop());
    }

}