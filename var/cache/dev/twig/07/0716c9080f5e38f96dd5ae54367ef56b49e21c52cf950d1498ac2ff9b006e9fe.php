<?php

/* @SonataUser/Form/roles_matrix.html.twig */
class __TwigTemplate_9d9692343e8e8760ed462fcefea1c5584ebf7b34b1357d3ac039bbe6e139d5f1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataUser/Form/roles_matrix.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataUser/Form/roles_matrix.html.twig"));

        // line 11
        echo "<table class=\"table table-condensed\">
    <thead>
    <tr>
        <th></th>
        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter((isset($context["permission_labels"]) || array_key_exists("permission_labels", $context) ? $context["permission_labels"] : (function () { throw new Twig_Error_Runtime('Variable "permission_labels" does not exist.', 15, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["label"]) {
            // line 16
            echo "            <th> ";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo " </th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </tr>
    </thead>
    <tbody>
    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["grouped_roles"]) || array_key_exists("grouped_roles", $context) ? $context["grouped_roles"] : (function () { throw new Twig_Error_Runtime('Variable "grouped_roles" does not exist.', 21, $this->source); })()));
        foreach ($context['_seq'] as $context["admin_label"] => $context["roles"]) {
            // line 22
            echo "        <tr>
            <th>";
            // line 23
            echo twig_escape_filter($this->env, $context["admin_label"], "html", null, true);
            echo "</th>
            ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter($context["roles"]));
            foreach ($context['_seq'] as $context["role"] => $context["attributes"]) {
                // line 25
                echo "                <td>
                    ";
                // line 26
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["attributes"], "form", array()), 'widget', array("label" => false));
                echo "
                    ";
                // line 27
                if ( !twig_get_attribute($this->env, $this->source, $context["attributes"], "is_granted", array())) {
                    // line 28
                    echo "                        <script>
                            \$('input[value=\"";
                    // line 29
                    echo twig_escape_filter($this->env, $context["role"], "html", null, true);
                    echo "\"]').iCheck('disable');
                            \$('form').on('submit', function() {
                                \$('input[value=\"";
                    // line 31
                    echo twig_escape_filter($this->env, $context["role"], "html", null, true);
                    echo "\"]').iCheck('enable');
                            });
                        </script>
                    ";
                }
                // line 35
                echo "                </td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['role'], $context['attributes'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['admin_label'], $context['roles'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    </tbody>
</table>

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataUser/Form/roles_matrix.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 39,  99 => 37,  92 => 35,  85 => 31,  80 => 29,  77 => 28,  75 => 27,  71 => 26,  68 => 25,  64 => 24,  60 => 23,  57 => 22,  53 => 21,  48 => 18,  39 => 16,  35 => 15,  29 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
<table class=\"table table-condensed\">
    <thead>
    <tr>
        <th></th>
        {% for label in permission_labels|sort %}
            <th> {{ label }} </th>
        {% endfor %}
    </tr>
    </thead>
    <tbody>
    {% for admin_label, roles in grouped_roles %}
        <tr>
            <th>{{ admin_label }}</th>
            {% for role, attributes in roles|sort %}
                <td>
                    {{ form_widget(attributes.form, { label: false }) }}
                    {% if not attributes.is_granted %}
                        <script>
                            \$('input[value=\"{{ role }}\"]').iCheck('disable');
                            \$('form').on('submit', function() {
                                \$('input[value=\"{{ role }}\"]').iCheck('enable');
                            });
                        </script>
                    {% endif %}
                </td>
            {% endfor %}
        </tr>
    {% endfor %}
    </tbody>
</table>

", "@SonataUser/Form/roles_matrix.html.twig", "C:\\Pronatec\\pronatec\\vendor\\sonata-project\\user-bundle\\src\\Resources\\views\\Form\\roles_matrix.html.twig");
    }
}
