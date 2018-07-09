<?php

/* @SonataUser/Form/roles_matrix_list.html.twig */
class __TwigTemplate_3ec86bb3bb252e98c455dca226ddffbbacd6fb9c490d363f93806320fa620c21 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataUser/Form/roles_matrix_list.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataUser/Form/roles_matrix_list.html.twig"));

        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter((isset($context["roles"]) || array_key_exists("roles", $context) ? $context["roles"] : (function () { throw new Twig_Error_Runtime('Variable "roles" does not exist.', 11, $this->source); })())));
        foreach ($context['_seq'] as $context["role"] => $context["attributes"]) {
            // line 12
            echo "    <li>";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["attributes"], "form", array()), 'widget', array("label" => twig_get_attribute($this->env, $this->source, $context["attributes"], "role_translated", array()), "value" => twig_get_attribute($this->env, $this->source, $context["attributes"], "role", array())));
            echo "</li>
    ";
            // line 13
            if ( !twig_get_attribute($this->env, $this->source, $context["attributes"], "is_granted", array())) {
                // line 14
                echo "        <script>
            \$('input[value=\"";
                // line 15
                echo twig_escape_filter($this->env, $context["role"], "html", null, true);
                echo "\"]').iCheck('disable');
            \$('form').on('submit', function() {
                \$('input[value=\"";
                // line 17
                echo twig_escape_filter($this->env, $context["role"], "html", null, true);
                echo "\"]').iCheck('enable');
            });
        </script>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['role'], $context['attributes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataUser/Form/roles_matrix_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 17,  43 => 15,  40 => 14,  38 => 13,  33 => 12,  29 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
{% for role, attributes in roles|sort %}
    <li>{{ form_widget(attributes.form, {label: attributes.role_translated, value: attributes.role}) }}</li>
    {% if not attributes.is_granted %}
        <script>
            \$('input[value=\"{{ role }}\"]').iCheck('disable');
            \$('form').on('submit', function() {
                \$('input[value=\"{{ role }}\"]').iCheck('enable');
            });
        </script>
    {% endif %}
{% endfor %}
", "@SonataUser/Form/roles_matrix_list.html.twig", "C:\\Pronatec\\pronatec\\vendor\\sonata-project\\user-bundle\\src\\Resources\\views\\Form\\roles_matrix_list.html.twig");
    }
}
